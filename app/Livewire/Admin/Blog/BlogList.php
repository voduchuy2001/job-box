<?php

namespace App\Livewire\Admin\Blog;

use App\Helpers\BaseHelper;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('List Of Blogs')]
class BlogList extends Component
{
    use WithPagination;
    use LivewireAlert;

    public string $searchTerm = '';

    public int $itemPerPage = 20;

    public mixed $check = null;

    public function change(int|string $id): void
    {
        $this->check = $this->check === $id ? null : $id;
    }

    public function delete(string|int $id): void
    {
        $post = Post::getPostById($id);

        File::delete($post->image->url);
        $post->image()->delete();
        $post->delete();
        $this->alert('success', __('Delete success :name', ['name' => $post->title]));
    }

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
