<?php

namespace App\Livewire\Admin\User\Modules;

use App\Models\User;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;

class PersonalCourse extends Component
{
    use LivewireAlert;

    public User $user;

    #[Rule('required|string|max:255')]
    public string $name;

    #[Rule('required|string|max:255')]
    public string $organization;

    #[Rule('required|date_format:d-m-Y|before_or_equal:today')]
    public string $startAt;

    #[Rule('required|date_format:d-m-Y|after_or_equal:startAt')]
    public string $endAt;

    #[Rule('required|string|max:1024')]
    public string $description;

    public function saveCourse(): void
    {
        $validatedData = $this->validate();

        $this->user->courses()->create([
            'name' => $validatedData['name'],
            'organization' => $validatedData['organization'],
            'start_at' => $validatedData['startAt'],
            'end_at' => $validatedData['endAt'],
            'description' => $validatedData['description'],
        ]);

        $this->alert('success', trans('Create success!'));
        $this->reset();
        $this->dispatch('hiddenModal');
        $this->dispatch('refresh');
    }

    public function render(): View
    {
        return view('livewire.admin.user.modules.personal-course');
    }
}
