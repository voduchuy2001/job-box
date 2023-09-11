<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Job extends Model
{
    protected $table = 'jobs';

    protected $fillable = [
        'name',
        'description',
        'qualification',
        'experience',
        'vacancy',
        'deadline_for_filing',
        'type',
        'user_id',
        'category_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function salary(): HasOne
    {
        return $this->hasOne(Salary::class, 'job_id');
    }

    public function address(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function getJobs(int $itemPerPage, string $searchTerm)
    {
        return Job::where('name', 'like', $searchTerm)
            ->orderByDesc('created_at')
            ->paginate($itemPerPage);
    }
}
