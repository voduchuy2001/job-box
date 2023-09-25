<?php

namespace App\Livewire\User\User\Modules;

use App\Livewire\User\User\UserResume;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;

class UserSkill extends Component
{
    use LivewireAlert;

    public mixed $user;

    #[Rule('required|string|max:255')]
    public string $name;

    #[Rule('nullable|string')]
    public string $description;

    public function mount(): void
    {
        if (! Auth::check()) {
            $this->redirect(UserResume::class, navigate: true);
        }
    }

    public function saveSkill(): void
    {
        $validatedData = $this->validate();

        $user = Auth::user();
        $user->skills()->create([
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
        return view('livewire.user.user.modules.user-skill');
    }
}
