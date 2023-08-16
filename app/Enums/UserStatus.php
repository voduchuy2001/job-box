<?php

namespace App\Enums;

enum UserStatus: string
{
    case IsActive = 'Is Active';
    case Blocked = 'Blocked';

    public static function values(): array
    {
        return array_column(self::cases(), 'value', 'name');
    }
}
