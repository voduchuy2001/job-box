<?php

namespace App\Livewire\Admin\User\Modules;

use App\Models\User;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class PersonalDetail extends Component
{
    use LivewireAlert;

    public User $user;

    public string $name;

    public string $email;

    public function mount(): void
    {
        $this->email = $this->user->email;
        $this->name = $this->user->name;
    }

    public function render(): View
    {
        return view('livewire.admin.user.modules.personal-detail');
    }
}
