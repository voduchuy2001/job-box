<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialActivities extends Model
{
    protected $table = 'social_activities';

    protected $fillable = [
        'organization',
        'position',
        'start_at',
        'end_at',
        'description',
    ];
}
