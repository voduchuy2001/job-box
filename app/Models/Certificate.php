<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $table = 'certificates';

    protected $fillable = [
        'name',
        'organization',
        'issued_on',
        'expires_on',
    ];
}
