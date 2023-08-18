<?php

namespace App\Livewire\Admin\Home;

use App\Helpers\BaseHelper;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard')]
class DashBoard extends Component
{
    #[Layout('layouts.admin')]
    public function render(): View
    {
        BaseHelper::setPageTitle(__('Dashboard'));
        return view('livewire.admin.home.dash-board');
    }
}
