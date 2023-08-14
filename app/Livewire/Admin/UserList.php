<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;

    public int $perPage = 8;

    public function render(): View
    {
        $users = User::orderByDesc('created_at')->paginate($this->perPage);

        return view('livewire.admin.user-list', [
            'users' => $users,
        ]);
    }
}
