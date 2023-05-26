<?php

declare(strict_types=1);

namespace App\Models;

class OrdersInfoView extends \Core\Model
{
    protected static string $table = 'orders_info_view';

    public static function getOrderInfo(int $id, string $role): array
    {
        return static::select()
            ->where('id', $id)
            ->where('role', $role, conjunction: 'AND')
            ->get();
    }
}