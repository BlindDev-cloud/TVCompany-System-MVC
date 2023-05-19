<?php

declare(strict_types=1);

namespace App\Enums;

enum Position: string
{
    case Manager = 'manager';
    case Admin = 'admin';
    case Producer = 'producer';
    case Journalist = 'journalist';
    case Editor = 'editor';
    case SoundOperator = 'sound operator';
    case VideoOperator = 'video operator';
    case Host = 'host';

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
