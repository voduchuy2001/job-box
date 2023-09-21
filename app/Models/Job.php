<?php

namespace App\Models;

use App\Helpers\MonthHelper;
use Illuminate\Database\Eloquent\Builder;
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

    public function scopeGroupByMonth(Builder $query): array
    {
        $currentYear = date('Y');
        $previousYear = $currentYear - 1;

        $months = MonthHelper::getMonths();

        $jobs = $query->selectRaw('MONTH(created_at) as month')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month');

        $currentYearResults = $jobs
            ->whereYear('created_at', $currentYear)
            ->get();

        $previousYearResults = $jobs->getModel()
            ->newQuery()
            ->selectRaw('MONTH(created_at) as month')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->whereYear('created_at', $previousYear)
            ->get();

        $labels = [];

        foreach ($currentYearResults as $result) {
            $month = $months[$result->month];
            if (! in_array($month, $labels)) {
                $labels[] = $month;
            }
        }

        foreach ($previousYearResults as $result) {
            $month = $months[$result->month];
            if (! in_array($month, $labels)) {
                $labels[] = $month;
            }
        }

        $currentYearJobs = $currentYearResults->pluck('count')->toArray();
        $previousYearJobs = $previousYearResults->pluck('count')->toArray();

        return compact('labels', 'currentYearJobs', 'previousYearJobs');
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
