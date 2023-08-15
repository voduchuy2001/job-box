<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateHelper
{
    public static function dateFormat(Carbon $date): string
    {
        return $date->format('d') . '-' . $date->format('m') . '-' . $date->format('Y') . ' ' . $date->format('g:i A');
    }
}
