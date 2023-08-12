<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';

    protected $fillable = [
        'name',
        'user_id',
        'job_id',
        'ward_id',
        'district_id',
        'province_id',
        'longitude',
        'latitude',
    ];
}
