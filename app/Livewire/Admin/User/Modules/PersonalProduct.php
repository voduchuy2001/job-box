<?php

namespace App\Livewire\Admin\User\Modules;

use App\Models\User;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;
use Livewire\Component;

class PersonalProduct extends Component
{
    use LivewireAlert;

    #[Locked]
    public User $user;

    #[Rule('required|string|max:255')]
    public string $name;

    #[Rule('required|string|max:255')]
    public string $type;

    #[Rule('required|date_format:d-m-Y|before_or_equal:today')]
    public string $completionTime;

    #[Rule('required|string|max:1024')]
    public string $description;

    public function saveProduct(): void
    {
        $validatedData = $this->validate();

        $this->user->products()->create([
            'name' => $validatedData['name'],
            'type' => $validatedData['type'],
            'completion_time' => $validatedData['completionTime'],
            'description' => $validatedData['description'],
        ]);

        $this->alert('success', trans('Create success!'));

        $this->reset([
            'name',
            'type',
            'description',
        ]);

        $this->dispatch('hiddenModal');
        $this->dispatch('refresh');
    }

    public function render(): View
    {
        return view('livewire.admin.user.modules.personal-product');
    }
}
