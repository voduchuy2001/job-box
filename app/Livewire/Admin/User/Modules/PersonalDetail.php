<?php

namespace App\Livewire\Admin\User\Modules;

use App\Models\User;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class PersonalDetail extends Component
{
    use LivewireAlert;

    public User $user;

    public string $name;

    public string $email;

    #[Rule('required:in:Is Active,Blocked')]
    public string $userStatus;

    #[Rule('nullable|string')]
    public mixed $role;

    public function mount(): void
    {
        $this->userStatus = $this->user->status;
        $this->email = $this->user->email;
        $this->name = $this->user->name;
        $role = json_decode($this->user->getRoleNames());
        if (count($role) > 0) {
            $this->role = $role[0];
        }
    }

    public function updateProfile(): void
    {
        $validatedData = $this->validate();

        if ($validatedData['role']) {
            $this->user->syncRoles([
                'name' => $validatedData['role'],
            ]);
        }

        if (! $validatedData['role']) {
            $this->user->syncRoles([]);
        }

        if ($this->user->is_root != 1) {
            $this->user->update([
                'status' => $validatedData['userStatus'],
            ]);

            $this->alert('success', trans('Update success'));
            $this->dispatch('refresh');
            return;
        }

        $this->alert('warning', trans('You can not update personal details for this account'));
    }

    public function render(): View
    {
        $roles = Role::orderByDesc('created_at')->get();

        return view('livewire.admin.user.modules.personal-detail', [
            'roles' => $roles,
        ]);
    }
}
