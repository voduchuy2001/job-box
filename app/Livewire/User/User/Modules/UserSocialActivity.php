<?php

namespace App\Livewire\User\User\Modules;

use App\Livewire\User\User\UserResume;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;

class UserSocialActivity extends Component
{
    use LivewireAlert;

    public mixed $user;

    public mixed $toggle = null;

    #[Rule('required|string|max:255')]
    public string $position;

    #[Rule('required|string|max:255')]
    public string $organization;

    #[Rule('required|date_format:Y-m-d|before_or_equal:today')]
    public string $startAt;

    #[Rule('nullable|date_format:Y-m-d|after_or_equal:startAt')]
    public string $endAt;

    #[Rule('required|string|max:1024')]
    public string $description;

    public function updatedToggle(): void
    {
        $this->reset('endAt');
    }

    public function mount(): void
    {
        if (! Auth::check()) {
            $this->redirect(UserResume::class, navigate: true);
        }
    }

    public function saveSocialActivity(): void
    {
        $validatedData = $this->validate();

        $user = Auth::user();
        $user->socialActivities()->create([
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
        return view('livewire.user.user.modules.user-social-activity');
    }
}
