<?php

declare(strict_types=1);

namespace Core\DB\Traits;

use Core\DB\Connection;
use PDO;

trait Queryable
{
    protected static string $table;
    protected static string $query;
    protected string $type;
    protected string $orderBy = '';

    protected function reset(): void
    {
        static::$query = '';
        $this->type = '';
        $this->orderBy = '';
    }

    public static function update(int $id, array $data): bool
    {
        if (!isset($id)) {
            return false;
        }

        $query = 'UPDATE ' . static::$table . ' SET ' . static::buildPlaceholders($data) . ' WHERE id=:id';
        $statement = Connection::connect()->prepare($query);

        $statement->execute([
            'id' => $id,
            ...$data
        ]);

        return true;
    }

    public static function delete(int $id): bool
    {
        $query = 'DELETE FROM ' . static::$table . ' WHERE id=:id';
        $statement = Connection::connect()->prepare($query);

        return $statement->execute(compact('id'));
    }

    protected static function buildPlaceholders(array $data): string
    {
        $placeholders = [];

        foreach ($data as $key => $value) {
            $placeholders[] = $key . '=:' . $key;
        }

        return implode(', ', $placeholders);
    }

    public static function select(array $columns = ['*']): static
    {
        $model = new static();
        $model->reset();
        static::$query = 'SELECT ' . implode(', ', $columns) . ' FROM ' . static::$table;
        $model->type = 'select';

        return $model;
    }

    public function where(string $field, mixed $value, string $condition = '='): static
    {
        if (!in_array($this->type, ['select', 'where', 'join'])) {
            exit('WHERE can not be used in this query');
        }

        if($this->type !== 'where'){
            static::$query .= ' WHERE ' . $field . ' '  . $condition . ' \'' . $value . '\'';
        }else{
            static::$query .= ' OR ' . $field . ' '  . $condition . ' \'' . $value . '\'';
        }

        $this->type = 'where';

        return $this;
    }

    public function get(): array
    {
        if(!empty($this->orderBy)){
            static::$query .= $this->orderBy;
        }

        return Connection::connect()->query(static::$query)->fetchAll(PDO::FETCH_CLASS, class: static::class);
    }

    public static function create(array $fields): int
    {
        $parameters = static::prepareFields($fields);

        $query = 'INSERT INTO ' . static::$table
            . ' (' . $parameters['names'] . ') VALUES'
            . ' (' . $parameters['placeholders'] . ')';

        $statement = Connection::connect()->prepare($query);
        $statement->execute($fields);

        return (int)Connection::connect()->lastInsertId();
    }

    protected static function prepareFields(array $fields): array
    {
        $names = array_keys($fields);
        $placeholders = preg_filter('/^/', ':', $names);

        return [
            'names' => implode(', ', $names),
            'placeholders' => implode(', ', $placeholders)
        ];
    }

    public static function find(int $id): false|object
    {
        $query = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';

        $statement = Connection::connect()->prepare($query);

        $statement->execute(compact('id'));

        return $statement->fetchObject(static::class);
    }

    public static function findBy(string $field, string $value): false|object
    {
        $query = 'SELECT * FROM ' . static::$table
            . ' WHERE ' . $field . '=:' . $field;

        $statement = Connection::connect()->prepare($query);

        $statement->execute([
            $field => $value
        ]);

        return $statement->fetchObject(static::class);
    }

    public function orderBy(string $column, string $direction = 'ASC'): static
    {
        if (!in_array($this->type, ['select', 'where', 'join'])) {
            exit('ORDER BY can not be used in this query');
        }

        $this->type = 'order';
        $this->orderBy = ' ORDER BY ' . $column . ' ' . $direction;

        return $this;
    }

    public function join(string $matchTable, string $matchId, string $join = ''): static
    {
        $this->type = 'join';
        static::$query .= ' ' . $join . ' JOIN '. $matchTable . ' ON ' . $matchTable . '.id=' . static::$table . '.' . $matchId;

        return $this;
    }
}