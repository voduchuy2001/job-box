<?php

namespace App\Livewire\Admin\Home\Modules;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Component;

class ApplicationChart extends Component
{
    public mixed $status = 'accepted';

    protected function getApplicationData(): array
    {
        $query = DB::table('applications')
            ->select(DB::raw('YEAR(created_at) AS year'), DB::raw('COUNT(*) AS total_applications'))
            ->groupBy(DB::raw('YEAR(created_at)'));

        $query->when($this->status === 'accepted', function ($query) {
            $query->where('status', 'accepted');
        })
            ->when($this->status === 'rejected', function ($query) {
                $query->where('status', 'rejected');
            });

        $latestApplications = $query->orderBy('year')
            ->limit(10)
            ->get();

        $labels = $latestApplications->pluck('year');
        $counts = $latestApplications->pluck('total_applications');

        return [
            'labels' => $labels,
            'counts' => $counts,
        ];
    }

    public function updatedStatus(): array
    {
        $query = $this->getApplicationData();

        $this->dispatch('refreshAppliedJobChart', $query);

        return $query;
    }

    public function render(): View
    {
        $chartData = $this->getApplicationData();

        return view('livewire.admin.home.modules.application-chart', [
            'labels' => $chartData['labels'],
            'counts' => $chartData['counts'],
        ]);
    }
}
