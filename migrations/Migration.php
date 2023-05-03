<?php

declare(strict_types=1);

namespace Migrations;

use Config\Config;
use Core\BaseException;
use Core\DB\Connection;
use http\Exception;

class Migration
{
    const SCRIPT_DIR = __DIR__ . '/scripts';

    public function runMigrations(): void
    {
        d('Fetching migrations...');

        $migrations = scandir(self::SCRIPT_DIR);
        $migrations = array_values(array_diff($migrations, ['.', '..', 'create_superuser.sql', 'migrations.sql']));

        foreach ($migrations as $migration) {
            $script = preg_replace('/^(\d+)_/i', '', $migration);
            if (!$this->migrationWasExecuted($script)) {
                d('Run [' . $script . ']..');
                $sql = file_get_contents(self::SCRIPT_DIR . '/' . $migration);
                $query = Connection::connect()->prepare($sql);
                $query->execute();

                d('[' . $script . '] done!');

                $this->saveMigration($script);
            }
        }

        d('Fetching migrations - done!');
    }

    protected function migrationWasExecuted(string $migration): bool
    {
        $query = Connection::connect()->prepare('SELECT * FROM migrations WHERE name=:name');

        $query->execute([
            'name' => $migration
        ]);

        return (bool)$query->fetch();
    }

    protected function saveMigration(string $migration): void
    {
        $query = Connection::connect()->prepare('INSERT INTO migrations (name) VALUES (:name)');
        $query->execute([
            'name' => $migration
        ]);
    }

    public function checkMigrationsTable(): void
    {
        $query = Connection::connect()->prepare("SELECT 1 FROM pg_tables WHERE tablename = 'migrations'");
        $query->execute();
        if (!$query->fetch()) {
            d('Migrations table does not exist');
            d('Attempt to create...');
            $this->createMigrationsTable();
        }
    }

    protected function createMigrationsTable(): void
    {
        $script = file_get_contents(self::SCRIPT_DIR . '/migrations.sql');
        $query = Connection::connect()->prepare($script);

        $query->execute();
        d('Migrations table was created!');
    }

    public function checkSuperuser(): void
    {
        d('Checking if superuser does exist...');

        $query = 'SELECT * FROM migrations';

        $statement = Connection::connect()->prepare($query);

        $statement->execute();

        while ($migration = $statement->fetch()) {
            if ($migration['name'] === 'create_superuser.sql') {
                d('Superuser does exist');
                exit();
            }
        }

        d('Superuser does not exist');
        $this->createSuperuser();
    }

    protected function createSuperuser(): void
    {
        d('Creating superuser...');

        $email = readline('Superuser email: ');
        $password = readline('Superuser password: ');

        $this->validateSuperuserData($email, $password);

        $query = file_get_contents(self::SCRIPT_DIR . '/create_superuser.sql');

        $statement = Connection::connect()->prepare($query);

        $statement->execute([
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'role_id' => 1
        ]);

        $this->saveMigration('create_superuser.sql');

        d('Superuser was created!');
    }

    protected function validateSuperuserData(string $email, string $password): void
    {
        if (!preg_match('/^[a-zA-Z0-9.!#$%&\'*+\/?^_`{|}~-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i', $email)) {
            throw new BaseException(message: 'Invalid email');
        }

        if(!preg_match('/.{8,}/', $password)){
            throw new BaseException(message: 'Password must be at least 8 characters');
        }
    }
}