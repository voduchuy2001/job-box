<?php

namespace App\Livewire\Admin\User\Modules;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Component;

class PersonalEducation extends Component
{
    #[Locked]
    public User $user;

    #[Rule('required|string|max:255')]
    public string $school;

    #[Rule('required|string|max:255')]
    public string $majors;

    #[Rule('nullable')]
    public string $startAt;

    #[Rule('nullable')]
    public string $endAt;

    #[Rule('required|string')]
    public string $description;

    public bool $toggle = false;

    public function saveEducation(): void
    {
        $validatedData = $this->validate();
    }

    public function render(): View
    {
        return view('livewire.admin.user.modules.personal-education');
    }
}
