<?php

namespace App\Livewire\Admin\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Change Password')]
class ChangePassword extends Component
{
    use LivewireAlert;

    #[Rule('required')]
    public string|null $oldPassword;

    #[Rule('required|string|min:6|max:32')]
    public string|null $password;

    #[Rule('same:password')]
    public string|null $confirmPassword;

    public function updatePassword(): void
    {
        $validatedData = $this->validate();

        if (Auth::user()->auth_type) {
            $this->alert('warning', trans('Not support to change password'));
            $this->reset();
            return;
        }

        if (! Hash::check($validatedData['oldPassword'], Auth::user()->password)) {
            $this->alert('warning', trans('Old password does not match!'));
            $this->reset();
            return;
        }

        Auth::user()->update([
            'password' => Hash::make($validatedData['password']),
        ]);

        $this->alert('success', trans('Update success!'));

        $this->reset();
    }

    #[Layout('layouts.admin')]
    public function render(): View
    {
        return view('livewire.admin.user.change-password');
    }
}
