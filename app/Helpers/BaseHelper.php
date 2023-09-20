<?php

namespace App\Helpers;

use Carbon\Carbon;

class BaseHelper
{
    public static function dateFormat(string $date): string
    {
        $date = Carbon::parse($date);
        return $date->format('d') . '-' . $date->format('m') . '-' . $date->format('Y');
    }

    public static function dateFormatForHumans(Carbon $date): string
    {
        return $date->diffForHumans();
    }

    public static function moneyFormat($amount): string
    {
        return number_format($amount, 0, ',', '.') . ' ' . trans('VND');
    }

    public static function moneyFormatForHumans($number): string
    {
        return match (true) {
            $number >= 1000000 => number_format($number / 1000000, 2) . trans(' M'),
            $number >= 1000 => number_format($number / 1000, 2) . trans(' k'),
            default => $number . trans(' d'),
        };
    }

    public static function setPageTitle(string $current, string|null $parent = null): void
    {
        if ($parent) {
            view()->share(['parent' => $parent]);
        }

        view()->share(['current' => $current]);
    }
}
