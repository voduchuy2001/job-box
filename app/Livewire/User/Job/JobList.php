<?php

namespace App\Livewire\User\Job;

use App\Models\Category;
use App\Models\Job;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Danh Sách Việc Làm')]
class JobList extends Component
{
    use WithPagination;

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

    #[Layout('layouts.user')]
    public function render(): View
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $salaryMin = is_numeric($this->salaryMin) ? (int) $this->salaryMin : null;
        $salaryMax = is_numeric($this->salaryMax) ? (int) $this->salaryMax : null;

        $jobs = Job::where('status', 'show')
            ->where('name', 'like', $searchTerm)
            ->when($this->filterByCategory, function ($query) {
                $query->whereIn('category_id', $this->filterByCategory);
            })
            ->when($this->filterByType, function ($query) {
                $query->whereIn('type', $this->filterByType);
            })
            ->when($salaryMin, function ($query) use ($salaryMin) {
                $query->where('min_salary', '>=', $salaryMin);
            })
            ->when($salaryMax, function ($query) use ($salaryMax) {
                $query->where(function ($query) use ($salaryMax) {
                    $query->where('max_salary', '<=', $salaryMax)
                        ->orWhereNull('max_salary');
                });
            })
            ->with('user', 'addresses.province')
            ->orderBy('created_at', 'desc')
            ->paginate($this->itemPerPage);

        return view('livewire.user.job.job-list', [
            'jobs' => $jobs,
        ]);
    }
}
