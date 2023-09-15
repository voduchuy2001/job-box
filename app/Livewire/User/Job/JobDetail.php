<?php

namespace App\Livewire\User\Job;

use App\Models\Job;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Chi Tiết Việc Làm')]
class JobDetail extends Component
{
    public mixed $job;

    public mixed $relatedJobs;

    public function mount(string|int $id): void
    {
        $job = Job::with('user', 'addresses.district', 'addresses.province')
            ->findOrFail($id);

        $relatedJobs = Job::with('category', 'user', 'addresses.province')
            ->where('id', '!=', $job->id)
            ->limit(6)
            ->get();

        $this->job = $job;
        $this->relatedJobs = $relatedJobs;
    }

    #[Layout('layouts.user')]
    public function render(): View
    {
        return view('livewire.user.job.job-detail');
    }
}
