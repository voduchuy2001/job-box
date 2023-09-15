<?php

namespace App\Livewire\Admin\User\Modules;

use App\Models\User;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Component;

class PersonalSocialActivity extends Component
{
    use LivewireAlert;

    #[Locked]
    public User $user;

    public mixed $toggle = null;

    #[Rule('required|string|max:255')]
    public string $position;

    #[Rule('required|string|max:255')]
    public string $organization;

    #[Rule('required|date_format:d-m-Y|before_or_equal:today')]
    public string $startAt;

    #[Rule('nullable|date_format:d-m-Y|after_or_equal:startAt')]
    public string $endAt;

    #[Rule('required|string|max:1024')]
    public string $description;

    public function updatedToggle(): void
    {
        $this->reset('endAt');
    }

    public function saveSocialActivity(): void
    {
        $validatedData = $this->validate();

        $this->user->socialActivities()->create([
            'organization' => $validatedData['organization'],
            'position' => $validatedData['position'],
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
        return view('livewire.admin.user.modules.personal-social-activity');
    }
}
