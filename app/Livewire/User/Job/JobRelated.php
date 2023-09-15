<?php

namespace App\Livewire\User\Job;

use App\Models\Job;
use Illuminate\View\View;
use Livewire\Component;

class JobRelated extends Component
{
    public Job $job;

    public mixed $jobs;

    public function mount(): void
    {
        $jobs = Job::with('category', 'user', 'addresses.province')
            ->where('id', '!=', $this->job->id)
            ->limit(6)
            ->get();

        $this->jobs = $jobs;
    }

    public function render(): View
    {
        return view('livewire.user.job.job-related');
    }
}
