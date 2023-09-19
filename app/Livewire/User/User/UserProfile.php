<?php

namespace App\Livewire\User\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
        $user = User::with([
            'avatar',
            'addresses',
        ])
            ->find(Auth::id());

        return view('livewire.user.user.user-profile', [
            'user' => $user,
        ]);
    }
}
