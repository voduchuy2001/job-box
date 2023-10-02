<?php

namespace App\Models;

use App\Enums\ImageType;
use App\Traits\GetYearResult;
use App\Traits\Label;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Builder;
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
    use Label;
    use GetYearResult;

    protected $fillable = [
        'name',
        'email',
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
    ];

    public function applications(): BelongsToMany
    {
        return $this->belongsToMany(Job::class, 'applications', 'user_id', 'job_id')
            ->withPivot(['presentation', 'status'])
            ->withTimestamps();
    }

    public function addresses(): MorphMany
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public function address(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function studentProfile(): MorphOne
    {
        return $this->morphOne(Profile::class, 'profileable')
            ->where('type', 'Student');
    }

    public function companyProfile(): MorphOne
    {
        return $this->morphOne(Profile::class, 'profileable')
            ->where('type', 'Company');
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

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class, 'user_id');
    }

    public function wishlists(): BelongsToMany
    {
        return $this->belongsToMany(Job::class, 'wishlists', 'user_id', 'job_id')
            ->withTimestamps();
    }

    public function scopeGroupByMonth(Builder $query): array
    {
        $currentYear = date('Y');
        $previousYear = $currentYear - 1;

        $currentYearResults = $this->getYearResults($query, $currentYear);
        $previousYearResults = $this->getYearResults($query, $previousYear);

        $labels = $this->getLabels($currentYearResults, $previousYearResults);
        $currentYearUsers = $this->getUserCounts($currentYearResults);
        $previousYearUsers = $this->getUserCounts($previousYearResults);

        return compact('labels', 'currentYearUsers', 'previousYearUsers');
    }

    private function getUserCounts(Collection $results): array
    {
        return $results->pluck('count')->toArray();
    }

    public static function getUsers(int $itemPerPage, string $searchTerm)
    {
        return User::where('name', 'like', $searchTerm)
            ->with('avatar')
            ->orWhere('email', 'like', $searchTerm)
            ->orderByDesc('created_at')
            ->paginate($itemPerPage);
    }
}
