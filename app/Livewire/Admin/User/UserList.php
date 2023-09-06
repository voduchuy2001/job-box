<?php

namespace App\Livewire\Admin\User;

use App\Helpers\BaseHelper;
use App\Models\User;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('List Of Users')]
class UserList extends Component
{
    use WithPagination;

    public string $searchTerm = '';

    public int $itemPerPage = 20;

    #[Layout('layouts.admin')]
    public function render(): View
    {
        BaseHelper::setPageTitle(trans('List Of Users'), trans('Users'));

        $searchTerm = '%' . $this->searchTerm . '%';
        $users = User::getUsers($this->itemPerPage, $searchTerm);

        return view('livewire.admin.user.user-list', [
            'users' => $users,
        ]);
    }
}
