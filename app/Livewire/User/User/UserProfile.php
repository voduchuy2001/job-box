<?php

namespace App\Livewire\User\User;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Trang Cá Nhân')]
class UserProfile extends Component
{
    #[Layout('layouts.user')]
    public function render(): View
    {
        return view('livewire.user.user.user-profile');
    }
}
