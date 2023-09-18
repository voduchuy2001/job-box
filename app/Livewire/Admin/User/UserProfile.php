<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('User Profile')]
class UserProfile extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public mixed $user;

    public mixed $confirm = null;

    public mixed $limits = [
        'addresses' => 3,
        'educations' => 3,
        'skills' => 3,
        'certificates' => 3,
        'experiences' => 3,
        'awards' => 3,
        'projects' => 3,
        'products' => 3,
        'courses' => 3,
        'socialActivities' => 3,
    ];

    public bool $show = false;

    public function showPermission(): void
    {
        $this->show = !$this->show;
    }

    public function mount(int|string $id): void
    {
        $user = User::with([
            'addresses',
            'addresses.province',
            'addresses.district',
            'addresses.ward',
            'educations',
            'skills',
            'certificates',
            'experiences',
            'awards',
            'projects',
            'products',
            'socialActivities',
            'courses'
        ])->findOrFail($id);

        $this->user = $user;
    }

    public function loadMore(string $component): void
    {
        $this->limits[$component] += 3;
        $this->dispatch('refresh');
    }

    #[On('refresh')]
    #[Layout('layouts.admin')]
    public function render(): View
    {
        $addresses = $this->user
            ->addresses
            ->sortByDesc('created_at')
            ->take($this->limits['addresses']);

        $educations = $this->user
            ->educations
            ->sortByDesc('created_at')
            ->take($this->limits['educations']);

        $skills = $this->user
            ->skills
            ->sortByDesc('created_at')
            ->take($this->limits['skills']);

        $certificates = $this->user
            ->certificates
            ->sortByDesc('created_at')
            ->take($this->limits['certificates']);

        $experiences = $this->user
            ->experiences
            ->sortByDesc('created_at')
            ->take($this->limits['experiences']);

        $awards = $this->user
            ->awards
            ->sortByDesc('created_at')
            ->take($this->limits['awards']);

        $projects = $this->user
            ->projects
            ->sortByDesc('created_at')
            ->take($this->limits['projects']);

        $products = $this->user
            ->products
            ->sortByDesc('created_at')
            ->take($this->limits['products']);

        $courses = $this->user
            ->courses
            ->sortByDesc('created_at')
            ->take($this->limits['courses']);

        $socialActivities = $this->user
            ->socialActivities
            ->sortByDesc('created_at')
            ->take($this->limits['socialActivities']);

        return view('livewire.admin.user.user-profile', [
            'addresses' => $addresses,
            'educations' => $educations,
            'skills' => $skills,
            'certificates' => $certificates,
            'experiences' => $experiences,
            'awards' => $awards,
            'projects' => $projects,
            'products' => $products,
            'socialActivities' => $socialActivities,
            'courses' => $courses,
        ]);
    }
}
