<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Experience extends Model
{
    protected $table = 'experiences';

    protected $fillable = [
        'company_name',
        'position',
        'start_at',
        'end_at',
        'description',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function getExperienceById(string|int $id)
    {
        return Experience::findOrFail($id);
    }
}
