<?php

declare(strict_types=1);

namespace App\Models;

use Core\DB\Connection;

class Order extends \Core\Model
{
    protected static string $table = 'orders';

    public static function createOrder(array $fields): void
    {
        $orderManagerData = [
            'account_id' => $fields['manager_id'],
            'role' => 'manager'
        ];

        $orderProducerData = [
            'account_id' => $fields['producer_id'],
            'role' => 'producer'
        ];

        unset($fields['producer_id']);
        unset($fields['manager_id']);

        $orderId = Order::create($fields);

        $orderManagerData['order_id'] = $orderId;
        $orderProducerData['order_id'] = $orderId;

        OrderAssignemt::create($orderManagerData);
        OrderAssignemt::create($orderProducerData);
    }

    public static function setStatus(int $id, string $status): void
    {
        $query = 'CALL set_order_status_procedure(:id, :status)';

        $statement = Connection::connect()->prepare($query);
        $statement->execute(compact('id', 'status'));
    }
}