<?php

namespace App\Livewire\Admin\RolePermission;

use App\Helpers\BaseHelper;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

#[Title('Roles And Permissions')]
class RoleSetting extends Component
{
    use LivewireAlert;
    use WithPagination;

    public string $searchTerm = '';

    public int $itemPerPage = 20;

    public mixed $confirm = null;

    #[Rule('required|string|max:32|unique:roles,id')]
    public string $name;

    #[Rule('required')]
    public mixed $roleHasPermissions = [];

    public bool $isEdit = false;

    public Role $role;

    public function changeType(): void
    {
        $this->isEdit = false;
        $this->resetForm();
    }

    public function saveRole(): void
    {
        $validatedData = $this->validate();

        $role = Role::create([
            'name' => $validatedData['name'],
            'guard_name' => 'web',
        ]);

        $role->syncPermissions($validatedData['roleHasPermissions']);

        $this->alert('success', trans('Create success!'));

        $this->resetForm();
        $this->dispatch('hiddenModal');
        $this->dispatch('refresh');
    }

    public function confirmDelete(int|string $id): void
    {
        $this->confirm = $this->confirm === $id ? null : $id;
    }

    public function deleteRole(string|int $id): void
    {
        $role = Role::findOrFail($id);
        $role->delete();

        $this->alert('success', trans('Delete success :name', ['name' => $role->name]));
        $this->dispatch('refresh');
    }

    public function editRole(string|int $id): void
    {
        $this->isEdit = true;
        $role = Role::findOrFail($id);
        $this->role = $role;
        $this->roleHasPermissions = $this->role->permissions->pluck('id');
        $this->name = $role->name;
    }

    public function updateRole(): void
    {
        $validatedData = $this->validate();

        $this->role->update([
            'name' => $validatedData['name'],
        ]);

        $this->role->syncPermissions($validatedData['roleHasPermissions']);

        $this->alert('success', trans('Update success!'));

        $this->resetForm();
        $this->dispatch('hiddenModal');
        $this->dispatch('refresh');
    }

    protected function resetForm(): void
    {
        $this->reset([
            'name',
            'roleHasPermissions'
        ]);
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

        $permissions = Permission::orderByDesc('created_at')->get();

        return view('livewire.admin.role-permission.role-setting', [
            'roles' => $roles,
            'permissions' => $permissions,
        ]);
    }
}
