<?php

namespace App\Models;

use Core\DB\Connection;

class OrderAssignemt extends \Core\Model
{
    protected static string $table = 'order_assignments';

    public static function employeeOrdersIds(int $employee): ?array
    {
        return OrdersIdsView::select(['id'])
                        ->where('account_id', $employee)
                        ->get();
    }
}