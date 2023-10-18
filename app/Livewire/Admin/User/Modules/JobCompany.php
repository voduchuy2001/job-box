<?php

namespace App\Livewire\Admin\User\Modules;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Component;

class JobCompany extends Component
{
    public mixed $userId;

    public function render(): View
    {
        $jobStatusCounts = DB::table('jobs')
            ->join('applications', 'jobs.id', '=', 'applications.job_id')
            ->where('jobs.company_id', $this->userId)
            ->whereIn('applications.status', ['accepted', 'rejected'])
            ->select('applications.status', DB::raw('count(*) as count'))
            ->groupBy('applications.status')
            ->get()
            ->keyBy('status')
            ->map
            ->count;

        $totalCount = User::where('id', $this->userId)
            ->withCount('jobs')
            ->value('jobs_count');

        $acceptCount = $jobStatusCounts->get('accepted', 0);

        $acceptPercentage = ($totalCount > 0) ? round(($acceptCount / $totalCount) * 100, 2) : 0;
        $rejectPercentage = $acceptPercentage ? (100 - $acceptPercentage) : 0;

        return view('livewire.admin.user.modules.job-company', [
            'acceptPercentage' => $acceptPercentage,
            'rejectPercentage' => $rejectPercentage,
        ]);
    }
}
