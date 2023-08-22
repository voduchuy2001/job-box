<?php

namespace App\Livewire\Admin\Blog;

use Illuminate\View\View;
use Livewire\Component;

class CreateBlog extends Component
{
    public function render(): View
    {
        return view('livewire.admin.blog.create-blog');
    }
}
