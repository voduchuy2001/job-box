<?php

namespace App\Models;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Rappasoft\LaravelAuthenticationLog\Traits\AuthenticationLoggable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use AuthenticationLoggable;

    protected $fillable = [
        'name',
        'email',
        'role',
        'status',
        'is_root',
        'password',
        'github_id',
        'auth_type',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'status' => UserStatus::class,
        'role' => UserRole::class,
    ];

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public static function getUsers(int $itemPerPage, string $searchTerm)
    {
        return User::where('name', 'like', $searchTerm)
            ->where('email', 'like', $searchTerm)
            ->where('role', '!=', 'company')
            ->orderByDesc('created_at')
            ->paginate($itemPerPage);
    }

    public static function getUserById(int $id)
    {
        return User::findOrFail($id);
    }
}
