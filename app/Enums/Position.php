<?php

declare(strict_types=1);

namespace App\Enums;

enum Position: string
{
    case Manager = 'Manager';
    case Admin = 'Admin';
    case Producer = 'Producer';
    case Journalist = 'Journalist';
    case Editor = 'Editor';
    case SoundOperator = 'Sound operator';
    case VideoOperator = 'Video operator';
    case Host = 'Host';

    public static function all(): array
    {
        return [
            self::Manager,
            self::Admin,
            self::Journalist,
            self::Producer,
            self::Editor,
            self::SoundOperator,
            self::VideoOperator,
            self::Host
        ];
    }
}
