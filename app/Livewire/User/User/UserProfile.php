<?php

namespace App\Livewire\User\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Trang Cá Nhân')]
class UserProfile extends Component
{
    use LivewireAlert;

    public int $step = 1;

    public string $firstName;

    public string $lastName;

    public string $studentId;

    public string $major;

    public string $course;

    public string $email;

    public string $phone;

    public string $career;

    public string $appliedPosition;

    public mixed $data;

    public function mount(): void
    {
        if ($user = Auth::user()->profile) {
            $userData = $user->payload;
            $this->email = $userData['email'];
            $this->firstName = $userData['firstName'] ?? '';
            $this->lastName = $userData['lastName'];
            $this->major = $userData['major'];
            $this->course = $userData['course'];
            $this->phone = $userData['phone'];
            $this->email = $userData['email'];
            $this->studentId = $userData['studentId'];
            $this->appliedPosition = $userData['appliedPosition'];
            $this->career = $userData['career'] ?? '';
        }
    }

    public function validateStep(int $step): bool
    {
        switch ($step) {
            case 1:
                $validatedData = $this->validate([
                    'firstName' => 'nullable|string|max:32',
                    'lastName' => 'required|string|min:2|max:32',
                    'studentId' => 'required|string|min:2|max:32',
                    'major' => 'required|string|min:2|max:32',
                    'course' => 'required|string|min:2|max:32|starts_with:K',
                ]);
                break;

            case 2:
                $validatedData = $this->validate([
                    'email' => 'required|email',
                    'phone' => 'required|numeric',
                    'career' => 'nullable|string',
                    'appliedPosition' => 'required|string|max:50'
                ]);
                break;

            default:
                return false;
        }

        if (!empty($validatedData)) {
            $this->data[$step] = $validatedData;
        }

        return !empty($validatedData);
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
        $this->redirect(UserResume::class, navigate: true);
    }

    #[On('refresh')]
    #[Layout('layouts.user')]
    public function render(): View
    {
        return view('livewire.user.user.user-profile');
    }
}
