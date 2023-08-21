<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Address extends Model
{
    protected $table = 'addresses';

    protected $fillable = [
        'name',
        'addressable_type',
        'addressable_id',
        'ward_id',
        'district_id',
        'province_id',
        'longitude',
        'latitude',
    ];

    public function addressable(): MorphTo
    {
        return $this->morphTo();
    }
}
