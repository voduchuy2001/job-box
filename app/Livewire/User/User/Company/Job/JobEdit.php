<?php

namespace App\Livewire\User\User\Company\Job;

use App\Events\CompanyJobEditEvent;
use App\Helpers\JobDataHelper;
use App\Models\Address;
use App\Models\Category;
use App\Models\District;
use App\Models\Job;
use App\Models\Province;
use App\Models\Ward;
use App\Notifications\CompanyJobEditNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

class JobEdit extends Component
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

    #[Rule('required|date_format:Y-m-d|after_or_equal:today')]
    public string $deadlineForFiling;

    #[Rule('required')]
    public string $min;

    #[Rule('required|gte:min')]
    public string $max;

    public mixed $addresses = [];

    public mixed $job;

    public function mount(string|int $id): void
    {
        $job = Job::with([
            'addresses.province',
            'addresses.district',
            'addresses.ward'
        ])
            ->findOrFail($id);

        if (Auth::id() != $job->user_id) {
            abort(403);
        }

        $this->job = $job;
        $this->name = $job->name;
        $this->position = $job->position;
        $this->category = $job->category_id;
        $this->type = $job->type;
        $this->description = $job->description;
        $this->vacancy = $job->vacancy;
        $this->experience = $job->experience;
        $this->deadlineForFiling = $job->deadline_for_filing;
        $this->min = $job->min_salary;
        $this->max = $job->max_salary;
        $this->addresses = $job->addresses;
    }

    public function updateJob(): void
    {
        $validatedData = $this->validate();

        $jobData = JobDataHelper::updateOrCreateJobData($validatedData);

        $this->job->update($jobData);

        if ($validatedData['provinceId']) {
            $this->job->addresses()->create([
                'province_id' => $validatedData['provinceId'],
                'district_id' => $validatedData['districtId'],
                'ward_id' => $validatedData['wardId'],
                'longitude' => $validatedData['longitude'],
                'latitude' => $validatedData['latitude'],
            ]);
        }

        Notification::send(Auth::user(), new CompanyJobEditNotification($this->job));
        broadcast(new CompanyJobEditEvent(trans('A job has been updated: :name!', ['name' => $this->job->name])));
        $this->alert('success', trans('Update success'));
        $this->dispatch('refresh');
        $this->redirect(JobList::class, navigate: true);
    }

    public function deleteAddress(string|int $id): void
    {
        Address::findOrFail($id)->delete();
        $this->addresses = $this->job->addresses()->get();
        $this->alert('success', trans('Delete success'));
    }

    #[Layout('layouts.user')]
    public function render(): View
    {
        $categories = Category::orderByDesc('created_at')->get();

        $provinces = Province::all();

        if (! empty($this->provinceId)) {
            $this->districts = District::where('province_id', $this->provinceId)->get();
        }

        if (! empty($this->districtId)) {
            $this->wards = Ward::where('district_id', $this->districtId)->get();
        }

        return view('livewire.user.user.company.job.job-edit', [
            'categories' => $categories,
            'provinces' => $provinces,
        ]);
    }
}