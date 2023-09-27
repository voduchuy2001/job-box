<?php

namespace App\Livewire\User\User\Company;

use App\Livewire\User\User\Company\Job\JobList;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Trang Cá Nhân')]
class CompanyProfile extends Component
{
    use LivewireAlert;

    #[Rule('required|string|max:50')]
    public string $name;

    #[Rule('required|email')]
    public string $email;

    #[Rule('required|numeric')]
    public string $phone;

    #[Rule('required')]
    public string $description;

    #[Rule('required|numeric')]
    public string $founded;

    #[Rule('required|string')]
    public string $headquarters;

    #[Rule('required|numeric')]
    public int $numberOfEmployee;

    #[Rule('nullable|string|max:255')]
    public mixed $socialMedialLinks;

    public int $step = 1;

    public mixed $data;

    public function validateStep(int $step): bool
    {
        switch ($step) {
            case 1:
                $validatedData = $this->validate([
                    'name' => 'required|string|max:50',
                    'email' => 'required|email',
                    'phone' => 'required|numeric',
                    'founded' => 'required|numeric',
                ]);
                break;

            case 2:
                $validatedData = $this->validate([
                    'description' => 'required',
                    'headquarters' => 'required|string',
                    'numberOfEmployee' => 'required|numeric',
                ]);
                break;

            default:
                return false;
        }

        if (! empty($validatedData)) {
            $this->data[$step] = $validatedData;
        }

        return ! empty($validatedData);
    }

    public function updateStep(bool $isNext): void
    {
        if ($isNext) {
            if ($this->validateStep($this->step)) {
                $this->step = min($this->step + 1, 4);
            }

            return;
        }
        $this->step = max($this->step - 1, 1);
    }

    public function saveProfile(): void
    {
        $user = User::findOrFail(Auth::id());

        $data = array_reduce($this->data, 'array_merge', []);

        $user->profile()->updateOrCreate([], [
            'payload' => $data,
        ]);

        $this->alert('success', 'Create Success');
        $this->redirect(JobList::class, navigate: true);
    }

    #[On('refresh')]
    #[Layout('layouts.user')]
    public function render(): View
    {
        return view('livewire.user.user.company.company-profile');
    }
}
