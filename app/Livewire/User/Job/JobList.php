<?php

namespace App\Livewire\User\Job;

use App\Models\Category;
use App\Models\Job;
use App\Traits\TrendingWord;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Danh Sách Việc Làm')]
class JobList extends Component
{
    use WithPagination;
    use TrendingWord;

    public int $itemPerPage = 12;

    public mixed $categories = [];

    public string $searchTerm = '';

    public mixed $filterByCategory = [];

    public string $salaryMin = '';

    public string $salaryMax = '';

    public mixed $filterByType = [];

    public function mount(): void
    {
        $this->categories = Category::orderByDesc('created_at')
            ->with('jobs')
            ->get();
    }

    private function queryFilterJob(): LengthAwarePaginator
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $salaryMin = is_numeric($this->salaryMin) ? (int) $this->salaryMin : null;
        $salaryMax = is_numeric($this->salaryMax) ? (int) $this->salaryMax : null;
        $this->createTrendingWords($this->searchTerm);

        $query = Job::where('status', 'show')
            ->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', $searchTerm)
                    ->orWhere('description', 'like', $searchTerm);
            })
            ->orWhere('position', 'like', $searchTerm)
            ->when($this->filterByCategory, fn ($query) => $query->whereIn('category_id', $this->filterByCategory))
            ->when($this->filterByType, fn ($query) => $query->whereIn('type', $this->filterByType))
            ->when($salaryMin, fn ($query) => $query->where('min_salary', '>=', $salaryMin))
            ->when($salaryMax, fn ($query) => $query->where(fn ($query) => $query->where('max_salary', '<=', $salaryMax)->orWhereNull('max_salary')));

        return $query->with('user')
            ->orderByDesc('created_at')
            ->paginate($this->itemPerPage);
    }

    #[Layout('layouts.user')]
    public function render(): View
    {
        $jobs = $this->queryFilterJob();

        return view('livewire.user.job.job-list', [
            'jobs' => $jobs,
        ]);
    }
}
