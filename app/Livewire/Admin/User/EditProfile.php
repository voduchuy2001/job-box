<?php

namespace App\Livewire\Admin\User;

use App\Enums\ImageType;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProfile extends Component
{
    use WithFileUploads;

    public User $user;

    #[Rule('image|max:2048')]
    public ?UploadedFile $avatar = null;

    #[Rule('image|max:2048')]
    public ?UploadedFile $coverImage = null;

    public function mount(int $id): void
    {
        $user = User::getUserById($id);
        $this->user = $user;
    }

    public function updatedAvatar(): void
    {
        if ($this->user->avatar) {
            $this->user->avatar()->delete();
            File::delete($this->user->avatar->url);
        }

        if ($this->avatar) {
            $avatarUrl = $this->avatar->store('upload');

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
