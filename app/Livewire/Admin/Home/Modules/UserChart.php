<?php

namespace App\Livewire\Admin\Home\Modules;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;

class UserChart extends Component
{
    public function render(): View
    {
        $thisYearUsers = User::whereYear('created_at', date('Y'))
            ->groupByMonth();

        return view('livewire.admin.home.modules.user-chart', [
            'thisYearUsers' => $thisYearUsers['users'],
            'labels' => $thisYearUsers['labels'],
        ]);
    }
}
