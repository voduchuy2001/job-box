<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Edit User Profile')]
class EditProfile extends Component
{
    use WithFileUploads;

    public User $user;

    public function mount(int|string $id): void
    {
        $this->user = User::getUserById($id);
    }

    #[Layout('layouts.admin')]
    public function render(): View
    {
        return view('livewire.admin.user.edit-profile');
    }
}
