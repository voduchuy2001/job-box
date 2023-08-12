<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'name',
        'customer',
        'number_of_members',
        'position',
        'technology',
        'start_at',
        'end_at',
        'description',
    ];
}
