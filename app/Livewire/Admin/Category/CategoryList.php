<?php

namespace App\Livewire\Admin\Category;

use App\Helpers\BaseHelper;
use App\Models\Category;
use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryList extends Component
{
    use WithPagination;
    use LivewireAlert;
    use AuthorizesRoleOrPermission;

    public string $searchTerm = '';

    public int $itemPerPage = 20;

    public Category $category;

    public bool $isEdit = false;

    #[Rule('required|string|min:3|max:32|unique:categories', onUpdate: false)]
    public string $name;

    public function changeType(): void
    {
        $this->isEdit = false;
    }

    public function saveCategory(): void
    {
        $validatedData = $this->validate();

        Category::create([
            'name' => $validatedData['name'],
        ]);

        $this->alert('success', trans('Create success!'));
        $this->reset([
            'name',
        ]);
        $this->dispatch('hiddenModal');
        $this->dispatch('refresh');
    }

    public function editCategory(string|int $id): void
    {
        $this->isEdit = true;
        $this->category = $category = Category::getCategoryById($id);
        $this->name = $category->name;
    }

    public function updateCategory(): void
    {
        $validatedData = $this->validate([
            'name' => 'required|string|min:2|max:32|unique:categories,name,'.$this->category->id,
        ]);

        $this->category->update([
            'name' => $validatedData['name'],
        ]);

        $this->alert('success', trans('Update success!'));
        $this->reset([
            'name',
        ]);
        $this->dispatch('hiddenModal');
        $this->dispatch('refresh');
    }

    public function deleteCategory(string|int $id): void
    {
        $category = Category::getCategoryById($id);

        if (! $category->jobs()->count()) {
            $category->delete();
            $this->alert('success', trans('Delete success :name', ['name' => $category->name]));
            $this->dispatch('hiddenModal');
            $this->dispatch('refresh');
            return;
        }

        $this->alert('warning', trans('Can not delete :name', ['name' => $category->name]));
    }

    #[On('refresh')]
    #[Layout('layouts.admin')]
    public function render(): View
    {
        BaseHelper::setPageTitle(trans('Categories'));

        $searchTerm = '%' . $this->searchTerm . '%';
        $categories = Category::where('name', 'like', $searchTerm)
            ->orderByDesc('created_at')
            ->paginate($this->itemPerPage);

        return view('livewire.admin.category.category-list', [
            'categories' => $categories,
        ]);
    }
}
