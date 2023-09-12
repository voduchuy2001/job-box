<?php

namespace App\Livewire\Admin\Job;

use App\Helpers\BaseHelper;
use App\Models\Job;
use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Trash')]
class JobTrash extends Component
{
    use WithPagination;
    use AuthorizesRoleOrPermission;

    public string $searchTerm = '';

    public int $itemPerPage = 20;

    public function mount(): void
    {
        $this->authorizeRoleOrPermission('job-trash');
    }

    #[Layout('layouts.admin')]
    public function render(): View
    {
        BaseHelper::setPageTitle(trans('Trash'), trans('Jobs'));

        $searchTerm = '%' . $this->searchTerm . '%';
        $jobs = Job::onlyTrashed()->where('name', 'like', $searchTerm)
            ->paginate($this->itemPerPage);

        return view('livewire.admin.job.job-trash', [
            'jobs' => $jobs,
        ]);
    }
}
