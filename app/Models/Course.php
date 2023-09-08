<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    protected $table = 'courses';

    protected $fillable = [
        'name',
        'organization',
        'issued_on',
        'expires_on',
        'description',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function getCourseById(string|int $id)
    {
        return Course::findOrFail($id);
    }
}
