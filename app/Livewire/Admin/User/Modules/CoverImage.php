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

class CoverImage extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public User $user;

    #[Rule('nullable|image|max:2048')]
    public ?UploadedFile $coverImage = null;

    public function updatedCoverImage(): void
    {
        $validated = $this->validate();

        if (! $validated['coverImage']) {
            return;
        }

        if ($this->user->coverImage) {
            File::delete($this->user->coverImage->url);
            $this->user->coverImage()->delete();
        };

        $avatarUrl = $this->coverImage->store('upload');

        $this->alert('success', __('Update success'));

        $this->user->coverImage()->create([
            'url' => $avatarUrl,
            'type' => ImageType::Cover,
        ]);
    }

    public function render(): View
    {
        return view('livewire.admin.user.modules.cover-image');
    }
}
