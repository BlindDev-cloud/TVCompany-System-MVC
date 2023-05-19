<?php

declare(strict_types=1);

namespace App\Enums;

enum Role: string
{
    case Admin = 'admin';
    case Manager = 'manager';
    case Producer = 'producer';
    case Journalist = 'journalist';
    case Editor = 'editor';

    public static function all(): array
    {
        return [
            self::Admin,
            self::Manager,
            self::Producer,
            self::Journalist,
            self::Editor
        ];
    }
}
