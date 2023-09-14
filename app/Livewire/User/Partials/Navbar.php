<?php

namespace App\Livewire\User\Partials;

use Illuminate\View\View;
use Livewire\Component;

class Navbar extends Component
{
    public string $active = 'hero';

    public function activeLink(string $key): void
    {
        $this->active = $key;
    }

    public function render(): View
    {
        $labels = [
            'hero' => trans('Home'),
            'categories' => trans('Categories'),
            'findJob' => trans('Jobs'),
        ];

        return view('livewire.user.partials.navbar', [
            'labels' => $labels,
            'active' => $this->active,
        ]);
    }
}
