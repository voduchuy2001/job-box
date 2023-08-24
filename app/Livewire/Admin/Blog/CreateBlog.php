<?php

namespace App\Livewire\Admin\Blog;

use App\Enums\ImageType;
use App\Helpers\BaseHelper;
use App\Models\Post;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateBlog extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    #[Rule('required|image|max:2048')]
    public mixed $image = null;

    #[Rule('required|string')]
    public string $content;

    #[Rule('required|string|max:255')]
    public string $title;

    public function create(): void
    {
        $validated = $this->validate();

        $imageUrl = $this->image->store('upload');

        $post = Post::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
        ]);

        $post->image()->create([
            'url' => $imageUrl,
            'type' => ImageType::Post,
        ]);

        $this->alert('success', __('Create success'));

        $this->redirect(BlogList::class);
    }

    #[Layout('layouts.admin')]
    public function render(): View
    {
        BaseHelper::setPageTitle(__('Create Blog'), __('Blog'));
        return view('livewire.admin.blog.create-blog');
    }
}
