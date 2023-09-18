<?php

namespace App\Livewire\User\Home\Modules;

use App\Models\Category;
use Illuminate\View\View;
use Livewire\Component;

class Categories extends Component
{
    public function render(): View
    {
        $categories = Category::orderByDesc('created_at')
            ->withCount(['jobs' => function ($query) {
                $query->where('status', 'show');
            }])
            ->having('jobs_count', '>', 0)
            ->with('jobs')
            ->limit(7)
            ->get();

        return view('livewire.user.home.modules.categories', [
            'categories' => $categories,
        ]);
    }
}
