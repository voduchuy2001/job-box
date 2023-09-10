<?php

namespace App\Livewire\Admin\User\Modules;

use App\Enums\UserStatus;
use App\Models\User;
use Illuminate\Validation\Rules\Enum;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Component;

class PersonalDetail extends Component
{
    use LivewireAlert;

    #[Locked]
    public User $user;

    #[Rule('required|string|max:32')]
    public string $name;

    #[Rule('required|email')]
    public string $email;

    #[Rule('nullable|string')]
    public string $present;

    #[Rule(new Enum(UserStatus::class))]
    public UserStatus $userStatus;

    public function mount(): void
    {
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->userStatus = $this->user->status;
        if ($this->user->present) {
            $this->present = $this->user->present;
        }
    }

    public function updateProfile(): void
    {
        $validatedData = $this->validate();

        if ($this->user->is_root == 1) {
            $this->alert('warning', trans('You can not update personal details for this account'));
            return;
        }

        $this->alert('success', trans('Update success'));

        $this->user->update([
            'name' => $validatedData['name'],
            'status' => $validatedData['userStatus'],
            'present' => $validatedData['present'],
        ]);
    }

    public function render(): View
    {
        return view('livewire.admin.user.modules.personal-detail');
    }
}
