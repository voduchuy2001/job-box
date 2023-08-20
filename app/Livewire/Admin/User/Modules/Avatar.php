<?php

namespace App\Livewire\Admin\User\Modules;

use App\Enums\ImageType;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Avatar extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public User $user;

    #[Rule('nullable|image|max:2048')]
    public ?UploadedFile $avatar = null;

    public function updatedAvatar(): void
    {
        $validate = $this->validate();

        if (! $validate['avatar']) {
            return;
        }

        if ($this->user->avatar) {
            File::delete($this->user->avatar->url);
            $this->user->avatar()->delete();
        }

        $avatarUrl = $this->avatar->store('upload');

        $this->alert('success', __('Update success'));

        $this->user->avatar()->create([
            'url' => $avatarUrl,
            'type' => ImageType::Avatar,
        ]);
    }

    public function render(): View
    {
        return view('livewire.admin.user.modules.avatar');
    }
}
