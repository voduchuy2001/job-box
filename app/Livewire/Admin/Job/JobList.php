<?php

namespace App\Livewire\Admin\Job;

use App\Helpers\BaseHelper;
use App\Models\Category;
use App\Models\District;
use App\Models\Job;
use App\Models\Province;
use App\Models\Ward;
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

    public string $searchTerm = '';

    public int $itemPerPage = 20;

    public bool $isEdit = false;

    #[Rule('required|integer')]
    public string|null $provinceId;

    public mixed $districts = [];

    #[Rule('required|integer')]
    public string|null $districtId;

    public mixed $wards = [];

    #[Rule('required')]
    public string|null $wardId;

    #[Rule('required|string|max:125')]
    public string $name;

    #[Rule('required|string|max:50')]
    public string $position;

    #[Rule('required|integer')]
    public string $category;

    #[Rule('required|string|in:Full Time,Part Time,Freelance,Internship')]
    public string $type;

    #[Rule('required|string|max:125')]
    public string $qualification;

    #[Rule('required|string')]
    public string $description;

    #[Rule('required|integer')]
    public string $vacancy;

    #[Rule('required|string|in:0,1,2,3,more')]
    public string $experience;

    #[Rule('required|date_format:d-m-Y|after_or_equal:today')]
    public string $deadlineForFiling;

    #[Rule('required|integer|min:0')]
    public string $min;

    #[Rule('required|integer|gt:min')]
    public string $max;

    public function changeType(): void
    {
        $this->isEdit = false;
    }

    public function saveJob(): void
    {
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
            'qualification' => $validatedData['qualification'],
            'user_id' => Auth::id(),
        ]);

        $job->salary()->create([
            'min' => $validatedData['min'],
            'max' => $validatedData['max'],
            'type' => 'job',
        ]);

        $job->address()->create([
            'province_id' => $validatedData['provinceId'],
            'district_id' => $validatedData['districtId'],
            'ward_id' => $validatedData['wardId'],
        ]);

        $this->alert('success', trans('Create success!'));
        $this->dispatch('hiddenModal');
        $this->dispatch('refresh');
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
