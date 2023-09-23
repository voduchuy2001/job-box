<?php

namespace App\Livewire\Admin\User\Modules;

use App\Models\User;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;

class PersonalDetail extends Component
{
    use LivewireAlert;

    public User $user;

    public string $name;

    public string $email;

    #[Rule('required:in:Is Active,Blocked')]
    public string $userStatus;

    public function mount(): void
    {
        $this->userStatus = $this->user->status;
        $this->email = $this->user->email;
        $this->name = $this->user->name;
    }

    public function updateProfile(): void
    {
        $validatedData = $this->validate();

        if ($this->user->is_root === 1) {
            $this->alert('warning', trans('You can not update this account'));
            return;
        }

        $this->user->update([
            'status' => $validatedData['userStatus'],
        ]);
        $this->alert('success', trans('Update success'));
    }


    public function render(): View
    {
        return view('livewire.admin.user.modules.personal-detail');
    }
}
