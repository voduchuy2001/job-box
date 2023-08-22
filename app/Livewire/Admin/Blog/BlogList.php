<?php

namespace App\Livewire\Admin\Blog;

use App\Helpers\BaseHelper;
use App\Models\Post;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('List Of Blogs')]
class BlogList extends Component
{
    use WithPagination;

    public string $searchTerm = '';

    public int $itemPerPage = 20;

    #[Layout('layouts.admin')]
    public function render(): View
    {
        BaseHelper::setPageTitle(__('List Of Blogs'), __('Blogs'));

        $searchTerm = '%' . $this->searchTerm . '%';
        $posts = Post::getUsers($this->itemPerPage, $searchTerm);

        return view('livewire.admin.blog.blog-list', [
            'posts' => $posts,
        ]);
    }
}
