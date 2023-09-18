<?php

namespace App\Livewire\Admin\Job;

use App\Helpers\BaseHelper;
use App\Helpers\JobDataHelper;
use App\Models\Category;
use App\Models\District;
use App\Models\Job;
use App\Models\Province;
use App\Models\Ward;
use App\Traits\AuthorizesRoleOrPermission;
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

    #[Rule('nullable|required_with:districtId,wardId')]
    public string|null $provinceId;

    public mixed $districts = [];

    #[Rule('required_with:provinceId')]
    public string|null $districtId;

    public mixed $wards = [];

    #[Rule('required_with:districtId')]
    public string|null $wardId;

    #[Rule('required|string|max:125')]
    public string $name;

    #[Rule('required|string|max:50')]
    public string $position;

    #[Rule('required|integer')]
    public string $category;

    #[Rule('required|string|in:Full Time,Part Time,Freelance,Internship')]
    public string $type;

    #[Rule('required|min:30|string')]
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

    public bool $show = false;

    public mixed $job;

    public mixed $addresses = [];

    public function saveJob(): void
    {
        $this->authorizeRoleOrPermission('job-create');
        $validatedData = $this->validate();

        $jobData = JobDataHelper::updateOrCreateJobData($validatedData);

        $job = Job::create($jobData);

        if ($validatedData['provinceId']) {
            $job->addresses()->create([
                'province_id' => $validatedData['provinceId'],
                'district_id' => $validatedData['districtId'],
                'ward_id' => $validatedData['wardId'],
            ]);
        }

        $this->alert('success', trans('Create success!'));
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

        $provinces = Province::all();

        if (! empty($this->provinceId)) {
            $this->districts = District::where('province_id', $this->provinceId)->get();
        }

        if (! empty($this->districtId)) {
            $this->wards = Ward::where('district_id', $this->districtId)->get();
        }

        return view('livewire.admin.job.job-list', [
            'jobs' => $jobs,
            'categories' => $categories,
            'provinces' => $provinces,
        ]);
    }
}
