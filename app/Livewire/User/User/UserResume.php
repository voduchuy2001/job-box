<?php

namespace App\Livewire\User\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Trang CV')]
class UserResume extends Component
{
    public function mount(): void
    {
        if (! Auth::user()->profile) {
            $this->redirect(UserProfile::class, navigate: true);
        }
    }

    #[Layout('layouts.user')]
    public function render(): View
    {
        return view('livewire.user.user.user-resume');
    }
}
