<?php

namespace App\Helpers;

use Carbon\Carbon;

class BaseHelper
{
    public static function dateFormat(Carbon $date): string
    {
        return $date->format('d') . '-' . $date->format('m') . '-' . $date->format('Y');
    }

    public static function moneyFormat($amount): string
    {
        return number_format($amount, 0, ',', '.') . ' ' . trans('VND');
    }

    public static function setPageTitle(string $current, string|null $parent = null): void
    {
        if ($parent) {
            view()->share(['parent' => $parent]);
        }

        view()->share(['current' => $current]);
    }
}
