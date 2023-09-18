<?php

namespace App\Livewire\Admin\Job;

use App\Helpers\BaseHelper;
use App\Models\Job;
use App\Traits\AuthorizesRoleOrPermission;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('List Of Jobs')]
class JobList extends Component
{
    use WithPagination;
    use LivewireAlert;
    use AuthorizesRoleOrPermission;

    public string $searchTerm = '';

    public int $itemPerPage = 20;

    public mixed $job;

    public function deleteJob(string|int $id): void
    {
        $this->authorizeRoleOrPermission('job-delete');
        $job = Job::findOrFail($id);
        $job->delete();
        $this->alert('success', trans('Delete success :name', ['name' => $job->name]));
        $this->dispatch('refresh');
    }

    #[On('refresh')]
    #[Layout('layouts.admin')]
    public function render(): View
    {
        BaseHelper::setPageTitle(trans('List Of Jobs'), trans('Jobs'));

        $searchTerm = '%' . $this->searchTerm . '%';
        $jobs = Job::getJobs($this->itemPerPage, $searchTerm);

        return view('livewire.admin.job.job-list', [
            'jobs' => $jobs,
        ]);
    }
}
