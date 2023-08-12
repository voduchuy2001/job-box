<?php

namespace App\Enums;

enum UserStatus: string
{
    case IsActive = 'isActive';
    case Blocked = 'blocked';
}
