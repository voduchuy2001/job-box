<?php

namespace App\Livewire\User\Job;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class JobDetail extends Component
{
    #[Layout('layouts.user')]
    public function render(): View
    {
        return view('livewire.user.job.job-detail');
    }
}
