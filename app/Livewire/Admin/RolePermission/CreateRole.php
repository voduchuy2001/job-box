<?php

namespace App\Livewire\Admin\RolePermission;

use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateRole extends Component
{
    use LivewireAlert;

    #[Rule('required|string|max:32|unique:roles')]
    public string $name;

    #[Rule('required')]
    public array $permission;

    public function saveRole(): void
    {
        $validatedData = $this->validate();

        $role = Role::create([
            'name' => $validatedData['name'],
            'guard_name' => 'web',
        ]);

        $role->syncPermissions($validatedData['permission']);

        $this->alert('success', trans('Create success!'));

        $this->reset([
            'name',
        ]);

        $this->dispatch('hiddenModal');
        $this->dispatch('refresh');
    }

    public function render(): View
    {
        $permissions = Permission::orderByDesc('created_at')->get();

        return view('livewire.admin.role-permission.create-role', [
            'permissions' => $permissions,
        ]);
    }
}
