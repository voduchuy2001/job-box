<?php

namespace App\Livewire\Admin\User\Modules;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Models\User;
use Illuminate\Validation\Rules\Enum;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;

class PersonalDetail extends Component
{
    use LivewireAlert;

    public User $user;

    #[Rule('required|string|max:32')]
    public string $name;

    #[Rule('required|email')]
    public string $email;

    #[Rule(new Enum(UserStatus::class))]
    public UserStatus $userStatus;

    #[Rule(new Enum(UserRole::class))]
    public UserRole $userRole;

    public function mount(): void
    {
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->userRole = $this->user->role;
        $this->userStatus = $this->user->status;
    }

    public function updateProfile(): void
    {
        $validated = $this->validate();

        if ($this->user->is_root == 1) {
            $this->alert('warning', __('You can not update personal details for this account'));
            return;
        }

        $this->alert('success', __('Update success'));

        $this->user->update([
            'name' => $validated['name'],
            'role' => $validated['userRole'],
            'status' => $validated['userStatus'],
        ]);
    }

    public function render(): View
    {
        return view('livewire.admin.user.modules.personal-detail');
    }
}
