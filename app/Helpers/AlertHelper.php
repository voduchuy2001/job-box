<?php

namespace App\Helpers;

class AlertHelper
{
    public static function flash(string $type, string $message): void
    {
        session()->flash('alert', [
            'type' => $type,
            'message' => $message
        ]);
    }
}
