<?php

namespace App\Livewire\User\User\Modules;

use App\Livewire\User\User\UserResume;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;

class UserAward extends Component
{
    use LivewireAlert;

    public mixed $user;

    #[Rule('required|string|max:255')]
    public string $name;

    #[Rule('required|string|max:255')]
    public string $organization;

    #[Rule('required|date_format:Y-m-d|before_or_equal:today')]
    public string $issuedOn;

    public function mount(): void
    {
        if (! Auth::check()) {
            $this->redirect(UserResume::class, navigate: true);
        }
    }

    public function saveAward(): void
    {
        $validatedData = $this->validate();

        $user = Auth::user();
        $user->awards()->create([
            'name' => $validatedData['name'],
            'organization' => $validatedData['organization'],
            'issued_on' => $validatedData['issuedOn'],
        ]);

        $this->alert('success', trans('Create success!'));
        $this->reset();
        $this->dispatch('hiddenModal');
        $this->dispatch('refresh');
    }

    public function render(): View
    {
        return view('livewire.user.user.modules.user-award');
    }
}
