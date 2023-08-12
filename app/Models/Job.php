<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';

    protected $fillable = [
        'name',
        'description',
        'qualification',
        'experience',
        'industry',
        'job_category_id',
        'job_type_id',
    ];
}
