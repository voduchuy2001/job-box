<?php

namespace App\Livewire\Admin;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class UserProfile extends Component
{
    public string $name;
    public string $email;
    public string $verifiedAt;
    public string $createdAt;
    public string $authType;
    public UserRole $role;
    public UserStatus $status;
    public string $loginAt;

    public function mount(): void
    {
        $user = Auth::user();

        $this->name = $user->name;
        $this->email = $user->email;
        $this->verifiedAt = $user->email_verified_at;
        $this->createdAt = $user->created_at;
        $this->authType = $user->auth_type;
        $this->role = $user->role;
        $this->status = $user->status;
        $this->loginAt = $user->lastLoginAt();
    }

    public function render(): View
    {
        return view('livewire.admin.user-profile');
    }
}
