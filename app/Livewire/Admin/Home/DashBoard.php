<?php

namespace App\Livewire\Admin\Home;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class DashBoard extends Component
{
    #[Layout('layouts.admin')]
    public function render(): View
    {
        return view('livewire.admin.home.dash-board');
    }
}
