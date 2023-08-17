<?php

namespace App\Livewire\Admin\User;

use App\Helpers\AlertHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Change Password')]
class ChangePassword extends Component
{
    #[Rule('required')]
    public string|null $oldPassword;

    #[Rule('required|string|min:6|max:32')]
    public string|null $password;

    #[Rule('same:password')]
    public string|null $confirmPassword;

    public function updatePassword(): void
    {
        $validated = $this->validate();

        if (! Hash::check($validated['oldPassword'], Auth::user()->password)) {
            AlertHelper::flash('danger', __('Password does not match'));
            $this->reset();
            return;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        AlertHelper::flash('success', __('Update success'));

        $this->reset();
    }

    #[Layout('layouts.admin')]
    public function render(): View
    {
        return view('livewire.admin.user.change-password');
    }
}
