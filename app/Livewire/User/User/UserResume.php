<?php

namespace App\Livewire\User\User;

use App\Models\Address;
use App\Models\Award;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Product;
use App\Models\Project;
use App\Models\Skill;
use App\Models\SocialActivity;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Trang CV')]
class UserResume extends Component
{
    use LivewireAlert;

    public mixed $user;

    public mixed $confirm = null;

    public mixed $confirmType = null;

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

    public function loadMore(string $component): void
    {
        $this->limits[$component] += 3;
        $this->dispatch('refresh');
    }

    public function confirmDelete(int|string $id, string $type): void
    {
        $this->confirm = $this->confirm === $id ? null : $id;
        $this->confirmType = $type;
    }

    public function mount(): void
    {
        if (! Auth::user()->profile) {
            $this->redirect(UserProfile::class, navigate: true);
        }

        $user = Auth::user();
        $this->user = $user;
    }

    public function downloadResume(): void
    {
        dd(123);
    }

    public function delete(string|int $id, string $type): void
    {
        switch ($type) {
            case 'address':
                $model = Address::findOrFail($id);
                break;
            case 'education':
                $model = Education::findOrFail($id);
                break;
            case 'skill':
                $model = Skill::findOrFail($id);
                break;
            case 'certificate':
                $model = Certificate::findOrFail($id);
                break;
            case 'experience':
                $model = Experience::findOrFail($id);
                break;
            case 'award':
                $model = Award::findOrFail($id);
                break;
            case 'project':
                $model = Project::findOrFail($id);
                break;
            case 'product':
                $model = Product::findOrFail($id);
                break;
            case 'course':
                $model = Course::findOrFail($id);
                break;
            case 'socialActivity':
                $model = SocialActivity::findOrFail($id);
                break;
            default:
                return;
        }

        $model->delete();
        $this->alert('success', trans('Delete success :name', ['name' => $model->name]));
        $this->dispatch('refresh');
    }

    #[On('refresh')]
    #[Layout('layouts.user')]
    public function render(): View
    {
        $user = $this->user
            ->with([
                'addresses',
                'educations',
                'skills',
                'certificates',
                'experiences',
                'awards',
                'projects',
                'products',
                'socialActivities',
                'courses'
            ]);

        $addresses = $this->user
            ->addresses()
            ->orderByDesc('created_at')
            ->limit($this->limits['addresses'])
            ->get();

        $educations = $this->user
            ->educations()
            ->orderByDesc('created_at')
            ->limit($this->limits['educations'])
            ->get();

        $skills = $this->user
            ->skills()
            ->orderByDesc('created_at')
            ->limit($this->limits['skills'])
            ->get();

        $certificates = $this->user
            ->certificates()
            ->orderByDesc('created_at')
            ->limit($this->limits['certificates'])
            ->get();

        $experiences = $this->user
            ->experiences()
            ->orderByDesc('created_at')
            ->limit($this->limits['experiences'])
            ->get();

        $awards = $this->user
            ->awards()
            ->orderByDesc('created_at')
            ->limit($this->limits['awards'])
            ->get();

        $projects = $this->user
            ->projects()
            ->orderByDesc('created_at')
            ->limit($this->limits['projects'])
            ->get();

        $products = $this->user
            ->products()
            ->orderByDesc('created_at')
            ->limit($this->limits['products'])
            ->get();

        $courses = $this->user
            ->courses()
            ->orderByDesc('created_at')
            ->limit($this->limits['courses'])
            ->get();

        $socialActivities = $this->user
            ->socialActivities()
            ->orderByDesc('created_at')
            ->limit($this->limits['socialActivities'])
            ->get();

        return view('livewire.user.user.user-resume', [
            'user' => $user,
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
