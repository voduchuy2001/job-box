<?php

namespace App\Helpers;

use Carbon\Carbon;

class BaseHelper
{
    public static function flash(string $type, string $message): void
    {
        session()->flash('alert', [
            'type' => $type,
            'message' => $message
        ]);
    }

    public static function dateFormat(Carbon $date): string
    {
        return $date->format('d') . '-' . $date->format('m') . '-' . $date->format('Y') . ' ' . $date->format('g:i A');
    }

    public static function setPageTitle(string $current, string|null $parent = null): void
    {
        if ($parent) {
            view()->share(['parent' => $parent]);
        }

        view()->share(['current' => $current]);
    }
}
