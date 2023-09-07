<?php

namespace App\Livewire\Admin\User\Modules;

use App\Models\User;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Component;

class PersonalExperience extends Component
{
    use LivewireAlert;

    #[Locked]
    public User $user;

    #[Rule('required|string|max:255')]
    public string $companyName;

    #[Rule('required|string|max:255')]
    public string $position;

    #[Rule('required|date_format:d-m-Y|before_or_equal:today')]
    public string $startAt;

    #[Rule('nullable|date_format:d-m-Y|after_or_equal:startAt')]
    public string $endAt;

    public function saveExperience(): void
    {
        $validatedData = $this->validate();

        $this->user->experiences()->updateOrCreate([
            'company_name' => $validatedData['companyName'],
            'position' => $validatedData['position'],
            'start_at' => $validatedData['startAt'],
            'end_at' => $validatedData['endAt'],
            'description' => $validatedData['description']
        ]);

        $this->alert('success', trans('Create success!'));

        $this->reset([
            'company_name',
            'position',
            'description',
        ]);

        $this->dispatch('hiddenModal');
        $this->dispatch('refresh');
    }

    #[Rule('nullable|string')]
    public string $description;

    public mixed $toggle = null;

    public function render(): View
    {
        return view('livewire.admin.user.modules.personal-experience');
    }
}
