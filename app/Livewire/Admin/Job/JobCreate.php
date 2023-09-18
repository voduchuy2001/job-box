<?php

namespace App\Livewire\Admin\Job;

use App\Helpers\BaseHelper;
use App\Helpers\JobDataHelper;
use App\Livewire\Admin\Category\CategoryList;
use App\Models\Category;
use App\Models\District;
use App\Models\Job;
use App\Models\Province;
use App\Models\Ward;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Create New Job')]
class JobCreate extends Component
{
    use LivewireAlert;

    #[Rule('nullable|required_with:districtId,wardId')]
    public string|null $provinceId;

    public mixed $districts = [];

    #[Rule('required_with:provinceId')]
    public string|null $districtId;

    public mixed $wards = [];

    #[Rule('required_with:districtId')]
    public string|null $wardId;

    #[Rule('required_with:provinceId|max:255|numeric|nullable')]
    public string $longitude;

    #[Rule('required_with:provinceId|max:255|numeric|nullable')]
    public string $latitude;

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

    public function mount(): void
    {
        if (! Category::count()) {
            $this->alert('warning', trans('Please add category first'));
            $this->redirect(CategoryList::class, navigate: true);
        }
    }

    public function saveJob(): void
    {
        $validatedData = $this->validate();

        $jobData = JobDataHelper::updateOrCreateJobData($validatedData);

        $job = Job::create($jobData);

        if ($validatedData['provinceId']) {
            $job->addresses()->create([
                'province_id' => $validatedData['provinceId'],
                'district_id' => $validatedData['districtId'],
                'ward_id' => $validatedData['wardId'],
                'longitude' => $validatedData['longitude'],
                'latitude' => $validatedData['latitude'],
            ]);
        }

        $this->alert('success', trans('Create success'));
        $this->redirect(JobList::class, navigate: true);
    }

    #[Layout('layouts.admin')]
    public function render(): View
    {
        BaseHelper::setPageTitle(trans('Create Jobs'), trans('Jobs'));

        $categories = Category::orderByDesc('created_at')
            ->get();

        $provinces = Province::all();

        if (! empty($this->provinceId)) {
            $this->districts = District::where('province_id', $this->provinceId)->get();
        }

        if (! empty($this->districtId)) {
            $this->wards = Ward::where('district_id', $this->districtId)->get();
        }

        return view('livewire.admin.job.job-create', [
            'categories' => $categories,
            'provinces' => $provinces,
        ]);
    }
}
