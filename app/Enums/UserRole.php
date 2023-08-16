<?php

namespace App\Enums;

enum UserRole: string
{
    case Admin = 'Admin';
    case User = 'User';
    case Company = 'Company';

    public static function values(): array
    {
        return array_column(self::cases(), 'value', 'name');
    }
}
