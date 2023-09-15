<?php

namespace App\Livewire\Admin\User;

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
use App\Models\User;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Edit User Profile')]
class EditProfile extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public User $user;

    public mixed $confirm = null;

    public mixed $confirmType = null;

    public int $limit = 3;

    public bool $show = false;

    public function showPermission(): void
    {
        $this->show = !$this->show;
    }

    public function mount(int|string $id): void
    {
        $user = User::getUserById($id);
        $this->user = $user;
    }

    public function loadMore(): void
    {
        $this->limit += 3;
        $this->dispatch('refresh');
    }

    public function confirmDelete(int|string $id, string $type): void
    {
        $this->confirm = $this->confirm === $id ? null : $id;
        $this->confirmType = $type;
    }

    public function delete(string|int $id, string $type): void
    {
        switch ($type) {
            case 'address':
                $model = Address::getAddressById($id);
                break;
            case 'education':
                $model = Education::getEducationById($id);
                break;
            case 'skill':
                $model = Skill::getSkillById($id);
                break;
            case 'certificate':
                $model = Certificate::getCertificateById($id);
                break;
            case 'experience':
                $model = Experience::getExperienceById($id);
                break;
            case 'award':
                $model = Award::getAwardById($id);
                break;
            case 'project':
                $model = Project::getProjectById($id);
                break;
            case 'product':
                $model = Product::getProductById($id);
                break;
            case 'course':
                $model = Course::getCourseById($id);
                break;
            case 'socialActivity':
                $model = SocialActivity::getSocialActivityById($id);
                break;
            default:
                return;
        }

        $model->delete();
        $this->alert('success', trans('Delete success :name', ['name' => $model->name]));
        $this->dispatch('refresh');
    }

    #[On('refresh')]
    #[Layout('layouts.admin')]
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
            ->limit($this->limit)
            ->get();

        $educations = $this->user
            ->educations()
            ->orderByDesc('created_at')
            ->limit($this->limit)
            ->get();

        $skills = $this->user
            ->skills()
            ->orderByDesc('created_at')
            ->limit($this->limit)
            ->get();

        $certificates = $this->user
            ->certificates()
            ->orderByDesc('created_at')
            ->limit($this->limit)
            ->get();

        $experiences = $this->user
            ->experiences()
            ->orderByDesc('created_at')
            ->limit($this->limit)
            ->get();

        $awards = $this->user
            ->awards()
            ->orderByDesc('created_at')
            ->limit($this->limit)
            ->get();

        $projects = $this->user
            ->projects()
            ->orderByDesc('created_at')
            ->limit($this->limit)
            ->get();

        $products = $this->user
            ->products()
            ->orderByDesc('created_at')
            ->limit($this->limit)
            ->get();
        $socialActivities = $this->user
            ->socialActivities()
            ->orderByDesc('created_at')
            ->limit($this->limit)
            ->get();

        $courses = $this->user
            ->courses()
            ->orderByDesc('created_at')
            ->limit($this->limit)
            ->get();

        return view('livewire.admin.user.edit-profile', [
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
