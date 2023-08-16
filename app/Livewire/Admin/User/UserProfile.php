<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('User Profile')]
class UserProfile extends Component
{
    public User $user;

    public function mount(string|int $id): void
    {
        $user = User::getUserById($id);
        $this->user = $user;
    }

    #[Layout('layouts.admin')]
    public function render(): View
    {
        return view('livewire.admin.user.user-profile');
    }
}
