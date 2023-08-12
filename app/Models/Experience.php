<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table = 'experiences';

    protected $fillable = [
        'company_name',
        'position',
        'start_at',
        'end_at',
        'description',
    ];
}
