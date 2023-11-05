<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TwoFactorAuthentication extends Model
{
    protected $table = 'two_factor_authentications';

    protected $fillable = [
        'user_id',
        'google2fa_enable',
        'google2fa_secret',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
