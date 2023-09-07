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

class CoverImage extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public User $user;

    #[Rule('nullable|image|max:2048')]
    public mixed $coverImage = null;

    #[On('refresh')]
    public function mount(): void
    {
        if ($this->user->coverImage) {
            $this->coverImage = $this->user->coverImage->url;
        }
    }

    public function updatedCoverImage(): void
    {
        $validatedData = $this->validate();

        if (! $validatedData['coverImage']) {
            return;
        }

        if ($this->user->coverImage) {
            File::delete($this->user->coverImage->url);
            $this->user->coverImage()->delete();
        };

        $avatarUrl = $this->coverImage->store('upload');

        $this->alert('success', trans('Update success'));

        $this->user->coverImage()->create([
            'url' => $avatarUrl,
            'type' => ImageType::Cover,
        ]);

        $this->dispatch('refresh');
    }

    public function render(): View
    {
        return view('livewire.admin.user.modules.cover-image');
    }
}
