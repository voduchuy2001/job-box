<?php

namespace App\Livewire\Admin\User\Modules;

use App\Models\User;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Component;

class PersonalEducation extends Component
{
    use LivewireAlert;

    #[Locked]
    public User $user;

    #[Rule('required|string|max:255')]
    public string $school;

    #[Rule('required|string|max:255')]
    public string $majors;

    #[Rule('required|date_format:d-m-Y|before_or_equal:today')]
    public string $startAt;

    #[Rule('nullable|date_format:d-m-Y|after_or_equal:startAt')]
    public string $endAt;

    #[Rule('nullable|string')]
    public string $description;

    public mixed $toggle = null;

    public function updatedToggle(): void
    {
        $this->reset('endAt');
    }

    public function saveEducation(): void
    {
        $validatedData = $this->validate();

        $this->user->educations()->create([
            'school' => $validatedData['school'],
            'majors' => $validatedData['majors'],
            'start_at' => $validatedData['startAt'],
            'end_at' => $validatedData['endAt'],
            'description' => $validatedData['description']
        ]);

        $this->alert('success', trans('Create success!'));
        $this->reset();
        $this->dispatch('hiddenModal');
        $this->dispatch('refresh');
    }

    public function render(): View
    {
        return view('livewire.admin.user.modules.personal-education');
    }
}
