<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Certificate extends Model
{
    protected $table = 'certificates';

    protected $fillable = [
        'name',
        'organization',
        'issued_on',
        'expires_on',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function getCertificateById(string|int $id)
    {
        return Certificate::findOrFail($id);
    }
}
