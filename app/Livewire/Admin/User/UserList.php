<?php

namespace App\Livewire\Admin\User;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Helpers\AlertHelper;
use App\Models\User;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;

    public string $name;
    public string $email;
    public UserRole $role;
    public UserStatus $status;
    public string $searchTerm = '';
    public int $itemPerPage = 20;

    public function updateUserStatus(int $id): void
    {
        $user = User::getUserById($id);

        if ($user->is_root == 1) {
            AlertHelper::flash('warning', __('You can not update status for this account'));
            return;
        }

        $user->update([
            'status' => $user->status->value == 'isActive' ? 'blocked' : 'isActive',
        ]);

        AlertHelper::flash('success', __('Update success'));
    }

    #[Layout('layouts.admin')]
    public function render(): View
    {
        $searchTerm = '%' . $this->searchTerm . '%';

        $users = User::getUsers($this->itemPerPage, $searchTerm);

        return view('livewire.admin.user.user-list', [
            'users' => $users,
        ]);
    }
}
