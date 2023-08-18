<?php

namespace App\Livewire\Admin\User;

use App\Enums\ImageType;
use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\Enum;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Edit User Profile')]
class EditProfile extends Component
{
    use WithFileUploads;

    use LivewireAlert;

    public User $user;

    #[Rule('nullable|image|max:2048')]
    public ?UploadedFile $avatar = null;

    #[Rule('nullable|image|max:2048')]
    public ?UploadedFile $coverImage = null;

    #[Rule('required|string|max:32')]
    public string $name;

    #[Rule('required|email')]
    public string $email;

    #[Rule(new Enum(UserStatus::class))]
    public UserStatus $userStatus;

    #[Rule(new Enum(UserRole::class))]
    public UserRole $userRole;

    protected $listeners = [
        'createAddress' => 'createAddress',
    ];

    public function createAddress(string $longitude, string $latitude): void
    {
        Address::updateOrCreate([
            'user_id' => $this->user->id,
        ],[
            'name' => '123',
            'user_id' => $this->user->id,
            'longitude' => $longitude,
            'latitude' => $latitude,
        ]);
    }

    public function mount(int|string $id): void
    {
        $user = User::getUserById($id);
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->userRole = $user->role;
        $this->userStatus = $user->status;
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

    public function updatedAvatar(): void
    {
        if ($this->user->avatar) {
            $this->user->avatar()->delete();
            File::delete($this->user->avatar->url);
        }

        if ($this->avatar) {
            $avatarUrl = $this->avatar->store('upload');

            $this->alert('success', __('Update success'));

            $this->user->avatar()->create([
                'url' => $avatarUrl,
                'type' => ImageType::Avatar,
            ]);
        }
    }

    public function updatedCoverImage(): void
    {
        if ($this->user->coverImage) {
            $this->user->coverImage()->delete();
            File::delete($this->user->coverImage->url);
        }

        if ($this->coverImage) {
            $avatarUrl = $this->coverImage->store('upload');

            $this->alert('success', __('Update success'));

            $this->user->coverImage()->create([
                'url' => $avatarUrl,
                'type' => ImageType::Cover,
            ]);
        }
    }

    #[Layout('layouts.admin')]
    public function render(): View
    {
        return view('livewire.admin.user.edit-profile');
    }
}
