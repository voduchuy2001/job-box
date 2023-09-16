<?php

namespace App\Livewire\Admin\User\Modules;

use App\Models\User;
use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class PersonalPermission extends Component
{
    use LivewireAlert;
    use AuthorizesRoleOrPermission;

    public User $user;

    #[Rule('nullable')]
    public mixed $userHasPermissions = [];

    #[On('refresh')]
    public function mount(): void
    {
        $permissions = $this->user->getAllPermissions();

        foreach ($permissions as $permission) {
            $this->userHasPermissions[] = $permission->id;
        }
    }

    public function savePermission(): void
    {
        $this->authorizeRoleOrPermission('permission-edit');
        $validatedData = $this->validate();

        if ($this->user->is_root != 1) {
            $this->user->syncPermissions($validatedData['userHasPermissions']);
            $this->alert('success', trans('Update success!'));
            return;
        }

        $this->alert('warning', trans('You can not update personal details for this account'));
    }

    public function render(): View
    {

        $permissions = Permission::orderByDesc('created_at')->get();

        return view('livewire.admin.user.modules.personal-permission', [
            'permissions' => $permissions,
        ]);
    }
}
