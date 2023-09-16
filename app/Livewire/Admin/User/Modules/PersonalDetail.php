<?php

namespace App\Livewire\Admin\User\Modules;

use App\Enums\UserStatus;
use App\Models\User;
use Illuminate\Validation\Rules\Enum;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class PersonalDetail extends Component
{
    use LivewireAlert;

    public User $user;

    #[Rule('required|string|max:32')]
    public string $name;

    #[Rule('required|email')]
    public string $email;

    #[Rule('nullable|string')]
    public string $present;

    #[Rule(new Enum(UserStatus::class))]
    public UserStatus $userStatus;

    #[Rule('nullable|string')]
    public mixed $role;

    public function mount(): void
    {
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->userStatus = $this->user->status;
        $role = json_decode($this->user->getRoleNames());
        if (count($role) > 0) {
            $this->role = $role[0];
        }

        if ($this->user->present) {
            $this->present = $this->user->present;
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
                'name' => $validatedData['name'],
                'status' => $validatedData['userStatus'],
                'present' => $validatedData['present'],
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
