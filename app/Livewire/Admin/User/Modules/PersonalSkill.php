<?php

namespace App\Livewire\Admin\User\Modules;

use App\Models\User;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Component;

class PersonalSkill extends Component
{
    use LivewireAlert;

    #[Locked]
    public User $user;

    #[Rule('required|string|max:255')]
    public string $name;

    #[Rule('nullable|string')]
    public string $description;

    public function saveSkill(): void
    {
        $validatedData = $this->validate();

        $this->user->skills()->create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
        ]);

        $this->alert('success', trans('Create success!'));
        $this->reset();
        $this->dispatch('hiddenModal');
        $this->dispatch('refresh');
    }

    public function render(): View
    {
        return view('livewire.admin.user.modules.personal-skill');
    }
}
