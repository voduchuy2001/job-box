<?php

namespace App\Livewire\Admin\RolePermission;

use App\Helpers\BaseHelper;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

#[Title('Roles And Permissions')]
class Setting extends Component
{
    use LivewireAlert;
    use WithPagination;

    public string $searchTerm = '';

    public int $itemPerPage = 20;

    public mixed $confirm = null;

    public Role $role;

    public function confirmDelete(int|string $id): void
    {
        $this->confirm = $this->confirm === $id ? null : $id;
    }

    public function delete(string|int $id): void
    {
        $role = Role::findOrFail($id);
        $role->delete();

        $this->alert('success', trans('Delete success :name', ['name' => $role->name]));
        $this->dispatch('refresh');
    }

    public function editRole(string|int $id): void
    {
        $this->role = Role::findOrFail($id);
    }

    #[On('refresh')]
    #[Layout('layouts.admin')]
    public function render(): View
    {
        BaseHelper::setPageTitle(trans('Roles And Permissions'));

        $searchTerm = '%' . $this->searchTerm . '%';
        $roles = Role::where('name', 'like', $searchTerm)
            ->orderByDesc('created_at')
            ->paginate($this->itemPerPage);

        return view('livewire.admin.role-permission.setting', [
            'roles' => $roles,
        ]);
    }
}
