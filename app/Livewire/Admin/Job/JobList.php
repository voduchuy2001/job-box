<?php

namespace App\Livewire\Admin\Job;

use App\Helpers\BaseHelper;
use App\Models\Category;
use App\Models\Job;
use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('List Of Jobs')]
class JobList extends Component
{
    use WithPagination;
    use LivewireAlert;
    use AuthorizesRoleOrPermission;

    public string $searchTerm = '';

    public int $itemPerPage = 20;

    public bool $isEdit = false;

    #[Rule('required|string|max:125')]
    public string $name;

    #[Rule('required|string|max:50')]
    public string $position;

    #[Rule('required|integer')]
    public string $category;

    #[Rule('required|string|in:Full Time,Part Time,Freelance,Internship')]
    public string $type;

    #[Rule('required|string')]
    public string $description;

    #[Rule('required|integer')]
    public string $vacancy;

    #[Rule('required|string|in:0,1,2,3,more')]
    public string $experience;

    #[Rule('required|date_format:d-m-Y|after_or_equal:today')]
    public string $deadlineForFiling;

    #[Rule('required|integer|min:0|max:1000000000')]
    public string $min;

    #[Rule('required|integer|gte:min|max:1000000000')]
    public string $max;

    #[Rule('required|string|in:show,hide')]
    public string $status;

    public Job $job;

    public function changeType(): void
    {
        $this->isEdit = false;
        $this->reset();
        $this->dispatch('refresh');
    }

    public function saveJob(): void
    {
        $this->authorizeRoleOrPermission('job-create');
        $validatedData = $this->validate();

        $job = Job::create([
            'name' => $validatedData['name'],
            'position' => $validatedData['position'],
            'category_id' => $validatedData['category'],
            'type' => $validatedData['type'],
            'description' => $validatedData['description'],
            'vacancy' => $validatedData['vacancy'],
            'experience' => $validatedData['experience'],
            'deadline_for_filing' => $validatedData['deadlineForFiling'],
            'status' => $validatedData['status'],
            'user_id' => Auth::id(),
            'min_salary' => $validatedData['min'],
            'max_salary' => $validatedData['max'],
        ]);

        $this->alert('success', trans('Create success!'));
        $this->dispatch('hiddenModal');
        $this->dispatch('refresh');
        $this->reset();
    }

    public function editJob(string|int $id): void
    {
        $this->isEdit = true;
        $this->job = $job = Job::getJobById($id);
        $this->name = $job->name;
        $this->position = $job->position;
        $this->category = $job->category_id;
        $this->type = $job->type;
        $this->description = $job->description;
        $this->vacancy = $job->vacancy;
        $this->experience = $job->experience;
        $this->deadlineForFiling = $job->deadline_for_filing;
        $this->status = $job->status;
        $this->min = $job->min_salary;
        $this->max = $job->max_salary;
    }

    public function updateJob(): void
    {
        $this->authorizeRoleOrPermission('job-edit');
        $validatedData = $this->validate();

        $this->job->update([
            'name' => $validatedData['name'],
            'position' => $validatedData['position'],
            'category_id' => $validatedData['category'],
            'type' => $validatedData['type'],
            'description' => $validatedData['description'],
            'vacancy' => $validatedData['vacancy'],
            'experience' => $validatedData['experience'],
            'deadline_for_filing' => $validatedData['deadlineForFiling'],
            'status' => $validatedData['status'],
            'user_id' => Auth::id(),
            'min_salary' => $validatedData['min'],
            'max_salary' => $validatedData['max'],
        ]);

        $this->alert('success', trans('Update success'));
        $this->dispatch('hiddenModal');
        $this->dispatch('refresh');
        $this->reset();
    }

    public function deleteJob(string|int $id): void
    {
        $this->authorizeRoleOrPermission('job-delete');
        $job = Job::getJobById($id);
        $job->delete();
        $this->alert('success', trans('Delete success :name', ['name' => $job->name]));
        $this->dispatch('refresh');
        $this->reset();
    }

    #[On('refresh')]
    #[Layout('layouts.admin')]
    public function render(): View
    {
        BaseHelper::setPageTitle(trans('List Of Jobs'), trans('Jobs'));

        $searchTerm = '%' . $this->searchTerm . '%';
        $jobs = Job::getJobs($this->itemPerPage, $searchTerm);

        $categories = Category::orderByDesc('created_at')->get();

        return view('livewire.admin.job.job-list', [
            'jobs' => $jobs,
            'categories' => $categories,
        ]);
    }
}
