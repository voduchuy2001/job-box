<?php

namespace App\Livewire\User\Home\Modules;

use App\Models\Job;
use Illuminate\View\View;
use Livewire\Component;

class Jobs extends Component
{
    public function render(): View
    {
        $jobs = Job::orderByDesc('created_at')
            ->with('user', 'addresses')
            ->where('status', 'show')
            ->where('vacancy', '>', 0)
            ->limit(8)->get();

        return view('livewire.user.home.modules.jobs', [
            'jobs' => $jobs,
        ]);
    }
}
