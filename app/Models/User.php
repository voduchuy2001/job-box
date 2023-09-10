<?php

namespace App\Models;

use App\Enums\ImageType;
use App\Enums\UserStatus;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Rappasoft\LaravelAuthenticationLog\Traits\AuthenticationLoggable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use AuthenticationLoggable;
    use HasRoles;

    protected $fillable = [
        'name',
        'email',
        'present',
        'status',
        'is_root',
        'password',
        'provider_id',
        'auth_type',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'status' => UserStatus::class,
    ];

    public function addresses(): MorphMany
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public function educations(): HasMany
    {
        return $this->hasMany(Education::class, 'user_id');
    }

    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class, 'user_id');
    }

    public function certificates(): HasMany
    {
        return $this->hasMany(Certificate::class, 'user_id');
    }

    public function awards(): HasMany
    {
        return $this->hasMany(Award::class, 'user_id');
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class, 'user_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'user_id');
    }

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class, 'user_id');
    }

    public function socialActivities(): HasMany
    {
        return $this->hasMany(SocialActivity::class, 'user_id');
    }

    public function skills(): MorphMany
    {
        return $this->morphMany(Skill::class, 'skillable');
    }

    public function avatar(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable')
            ->where('type', '=', ImageType::Avatar);
    }

    public function coverImage(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable')
            ->where('type', '=', ImageType::Cover);
    }

    public static function getUsers(int $itemPerPage, string $searchTerm)
    {
        return User::where('name', 'like', $searchTerm)
            ->orWhere('email', 'like', $searchTerm)
            ->orderByDesc('created_at')
            ->paginate($itemPerPage);
    }

    public static function getUserById(int|string $id)
    {
        return User::findOrFail($id);
    }
}
