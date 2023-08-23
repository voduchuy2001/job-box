<?php

namespace App\Livewire\Admin\Blog;

use App\Enums\ImageType;
use App\Helpers\BaseHelper;
use App\Models\Post;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Edit Blog')]
class EditBlog extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public string $oldImage;

    #[Rule('nullable|image|max:2048')]
    public ?UploadedFile $image = null;

    #[Rule('required|string')]
    public string $content;

    #[Rule('required|string|max:255')]
    public string $title;

    public Post $post;

    public function mount(string|int $id): void
    {
        $post = Post::getPostById($id);
        $this->post = $post;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->oldImage = $post->image->url;
    }

    public function update(): void
    {
        $validated = $this->validate();

        if (! $validated['image']) {
            $this->post->update([
                'title' => $validated['title'],
                'content' => $validated['content'],
            ]);

            $this->alert('success', __('Update success'));

            return;
        }

        if ($this->post->image) {
            File::delete($this->post->image->url);
            $this->post->image()->delete();
        }

        $imageUrl = $this->image->store('upload');

        $this->post->image()->create([
            'url' => $imageUrl,
            'type' => ImageType::Post,
        ]);

        $this->post->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
        ]);

        $this->alert('success', __('Update success'));
    }

    #[Layout('layouts.admin')]
    public function render(): View
    {
        BaseHelper::setPageTitle(__('Edit Blog'), __('Blog'));

        return view('livewire.admin.blog.edit-blog');
    }
}
