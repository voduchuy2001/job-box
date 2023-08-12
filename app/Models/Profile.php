<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';

    protected $fillable = [
        'position',
        'sex',
        'date_of_birth',
        'present',
        'view',
    ];
}
