<?php

namespace App\Livewire\Admin\User\Modules;

use App\Enums\ImageType;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Avatar extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public User $user;

    #[Rule('nullable|image|max:2048')]
    public mixed $avatar = null;

    #[On('refresh')]
    public function mount(): void
    {
        $this->avatar = $this->user->avatar->url;
    }

    public function updatedAvatar(): void
    {
        $validated = $this->validate();

        if (! $validated['avatar']) {
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

        $this->dispatch('refresh');
    }

    public function render(): View
    {
        return view('livewire.admin.user.modules.avatar');
    }
}
