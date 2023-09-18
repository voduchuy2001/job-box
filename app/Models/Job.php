<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;

    protected $table = 'jobs';

    protected $fillable = [
        'name',
        'description',
        'position',
        'experience',
        'vacancy',
        'deadline_for_filing',
        'type',
        'min_salary',
        'max_salary',
        'status',
        'user_id',
        'category_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function addresses(): MorphMany
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function wishlists(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'wishlists', 'job_id', 'user_id')
            ->withTimestamps();
    }

    protected static function boot(): void
    {
        parent::boot();

        static::deleting(function ($job) {
            if ($job->isForceDeleting()) {
                $job->addresses()->delete();
                $job->wishlists()->detach();
            }
        });
    }

    public static function getJobs(int|null $itemPerPage, string $searchTerm)
    {
        return Job::where(function ($query) use ($searchTerm) {
            $query->where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $searchTerm . '%');
        })
            ->orderByDesc('created_at')
            ->paginate($itemPerPage);
    }

    public static function getLimitJobs(string $searchTerm)
    {
        return Job::where(function ($query) use ($searchTerm) {
            $query->where('name', 'like', '%' . $searchTerm . '%')
                ->orWhere('description', 'like', '%' . $searchTerm . '%');
        })
            ->where('status', 'show')
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();
    }
}
