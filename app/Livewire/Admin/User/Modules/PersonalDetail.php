<?php

namespace App\Livewire\Admin\User\Modules;

use App\Helpers\BaseHelper;
use App\Models\User;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class PersonalDetail extends Component
{
    use LivewireAlert;

    public User $user;

    public string $createdAt;

    public string $email;

    public function mount(): void
    {
        $this->email = $this->user->email;
        $this->createdAt = BaseHelper::dateFormat($this->user->created_at);
    }

    public function render(): View
    {
        return view('livewire.admin.user.modules.personal-detail');
    }
}
