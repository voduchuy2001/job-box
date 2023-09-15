<?php

namespace App\Livewire\Admin\User\Modules;

use App\Models\User;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Component;

class PersonalAward extends Component
{
    use LivewireAlert;

    #[Locked]
    public User $user;

    #[Rule('required|string|max:255')]
    public string $name;

    #[Rule('required|string|max:255')]
    public string $organization;

    #[Rule('required|date_format:d-m-Y|before_or_equal:today')]
    public string $issuedOn;

    public function saveAward(): void
    {
        $validatedData = $this->validate();

        $this->user->awards()->create([
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
        return view('livewire.admin.user.modules.personal-award');
    }
}
