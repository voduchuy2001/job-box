<?php

namespace App\Livewire\User\User\Modules;

use App\Livewire\User\User\UserResume;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;

class UserProject extends Component
{
    use LivewireAlert;

    public mixed $user;

    public mixed $toggle = null;

    #[Rule('required|string|max:255')]
    public string $name;

    #[Rule('required|string|max:255')]
    public string $customer;

    #[Rule('required|int')]
    public int $numberOfMembers;

    #[Rule('required|string|max:255')]
    public string $technology;

    #[Rule('required|date_format:Y-m-d|before_or_equal:today')]
    public string $startAt;

    #[Rule('nullable|date_format:Y-m-d|after_or_equal:startAt')]
    public string $endAt;

    #[Rule('required|string|max:1024')]
    public string $description;

    #[Rule('required|string')]
    public string $position;

    public function updatedToggle(): void
    {
        $this->reset('endAt');
    }

    public function mount(): void
    {
        if (! Auth::check()) {
            $this->redirect(UserResume::class, navigate: true);
        }
    }

    public function saveProject(): void
    {
        $validatedData = $this->validate();

        $user = Auth::user();
        $user->projects()->create([
            'name' => $validatedData['name'],
            'customer' => $validatedData['customer'],
            'number_of_members' => $validatedData['numberOfMembers'],
            'position' => $validatedData['position'],
            'technology' => $validatedData['technology'],
            'start_at' => $validatedData['startAt'],
            'end_at' => $validatedData['endAt'],
            'description' => $validatedData['description'],
        ]);

        $this->alert('success', trans('Create success!'));
        $this->reset();
        $this->dispatch('hiddenModal');
        $this->dispatch('refresh');
    }

    public function render(): View
    {
        return view('livewire.user.user.modules.user-project');
    }
}
