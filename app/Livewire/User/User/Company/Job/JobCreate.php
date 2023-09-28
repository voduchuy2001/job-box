<?php

namespace App\Livewire\User\User\Company\Job;

use App\Events\CompanyJobCreateEvent;
use App\Helpers\JobDataHelper;
use App\Models\Category;
use App\Models\District;
use App\Models\Job;
use App\Models\Province;
use App\Models\Ward;
use App\Notifications\CompanyJobCreateNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

class JobCreate extends Component
{
    use LivewireAlert;

    #[Rule('required|required_with:districtId,wardId')]
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

    #[Rule('required|date_format:Y-m-d|after_or_equal:today')]
    public string $deadlineForFiling;

    #[Rule('required')]
    public string $min;

    #[Rule('required|gte:min')]
    public string $max;

    public function mount(): void
    {
        if (! Category::count()) {
            $this->alert('warning', trans('Please wait for the admin to add more categories'));
            $this->redirect(JobList::class, navigate: true);
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

        Notification::send(Auth::user(), new CompanyJobCreateNotification($job));
        broadcast(new CompanyJobCreateEvent(trans('A new job has been added: (:name)!', ['name' => $job->name])));
        $this->alert('success', trans('Create success'));
        $this->dispatch('refresh');
        $this->redirect(JobList::class, navigate: true);
    }

    #[Layout('layouts.user')]
    public function render(): View
    {
        $categories = Category::orderByDesc('created_at')
            ->get();

        $provinces = Province::all();

        if (! empty($this->provinceId)) {
            $this->districts = District::where('province_id', $this->provinceId)->get();
        }

        if (! empty($this->districtId)) {
            $this->wards = Ward::where('district_id', $this->districtId)->get();
        }

        return view('livewire.user.user.company.job.job-create', [
            'categories' => $categories,
            'provinces' => $provinces,
        ]);
    }
}