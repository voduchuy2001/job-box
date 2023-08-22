<?php

namespace App\Livewire\Admin\Blog;

use App\Helpers\BaseHelper;
use Illuminate\Http\UploadedFile;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreateBlog extends Component
{
    use LivewireAlert;

//    #[Rule('required|image|max:2048')]
//    public ?UploadedFile $image;

    #[Rule('required|string')]
    public string $content = '';

    #[Rule('required|string|max:255')]
    public string $title = '';

    public function createPost()
    {
        dd($this->content);
        $validated = $this->validate();

        dd($validated);
    }

    #[Layout('layouts.admin')]
    public function render(): View
    {
        BaseHelper::setPageTitle(__('Create Blog'), __('Blog'));
        return view('livewire.admin.blog.create-blog');
    }
}
