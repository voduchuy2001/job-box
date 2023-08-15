<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProfile extends Component
{
    use WithFileUploads;

    public User $user;

    public string $image = '';

    public function mount(int $id): void
    {
        $user = User::getUserById($id);
        $this->user = $user;
    }

    public function updatedImage()
    {

    }

    #[Layout('layouts.admin')]
    public function render(): View
    {
        return view('livewire.admin.user.edit-profile');
    }
}
