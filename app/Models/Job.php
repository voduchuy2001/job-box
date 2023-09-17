<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Job extends Model
{
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
        return $this->belongsToMany(User::class, 'wishlists', 'job_id', 'user_id');
    }

    public static function getJobById(int|string $id)
    {
        return Job::findOrFail($id);
    }

    public static function getJobs(int|null $itemPerPage, string $searchTerm)
    {
        return Job::where('name', 'like', $searchTerm)
            ->orWhere('description', 'like', $searchTerm)
            ->orderByDesc('created_at')
            ->paginate($itemPerPage);
    }

    public static function getLimitJobs(string $searchTerm)
    {
        return Job::where('name', 'like', '%' . $searchTerm . '%')
            ->where('status', 'show')
            ->orWhere('description', 'like', '%' . $searchTerm . '%')
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();
    }
}
