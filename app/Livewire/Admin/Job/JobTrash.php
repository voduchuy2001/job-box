<?php

namespace App\Livewire\Admin\Job;

use App\Helpers\BaseHelper;
use App\Models\Job;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Trash')]
class JobTrash extends Component
{
    use WithPagination;

    public string $searchTerm = '';

    public int $itemPerPage = 20;

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
