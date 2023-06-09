<?php

declare(strict_types=1);

namespace App\Enums;

enum Role: string
{
    case Admin = 'admin';
    case Manager = 'manager';
    case Producer = 'producer';

    public static function all(): array
    {
        return [
            self::Admin,
            self::Manager,
            self::Producer
        ];
    }
}
