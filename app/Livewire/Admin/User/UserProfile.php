<?php

namespace App\Livewire\Admin\User;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class UserProfile extends Component
{
    #[Layout('layouts.admin')]
    public function render(): View
    {
        return view('livewire.admin.user.user-profile');
    }
}
