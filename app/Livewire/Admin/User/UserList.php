<?php

namespace App\Livewire\Admin\User;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class UserList extends Component
{
    #[Layout('layouts.admin')]
    public function render(): View
    {
        return view('livewire.admin.user.user-list');
    }
}
