<?php

namespace App\Livewire\User\Job;

use App\Events\StudentJobApplyEvent;
use App\Livewire\User\Home\HomePage;
use App\Mail\ApplyJob;
use App\Notifications\StudentJobApplyNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Job;

#[Title('Nộp Hồ Sơ')]
class JobApplication extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    #[Rule('required|file|mimes:pdf,docx,doc|max:4096')]
    public mixed $resume = '';

    public mixed $fileName;

    #[Rule('nullable|string|max:2048')]
    public string $presentation;

    public mixed $job;

    public function mount(string|int $id): void
    {
        $job = Job::findOrFail($id);

        $this->job = $job;
    }

    public function removeResume(): void
    {
        $this->fileName = '';
        $this->resume = '';
    }

    public function updatedResume(): void
    {
        $this->fileName = $this->resume->getClientOriginalName();
    }

    public function applyJob(): void
    {
        $validatedData = $this->validate();

        $user = Auth::user();

        $user->applications()->attach($this->job, [
           'status' => 'pending',
           'presentation' => $validatedData['presentation'],
        ]);

        $mailData = [
            'email' => $user->studentProfile->payload['email'],
            'companyName' => $this->job->user->name,
            'subject' => trans('Job Application for :jobTitle', ['jobTitle' => $this->job->name]),
            'presentation' => $validatedData['presentation'],
        ];

        Notification::send(Auth::user(), new StudentJobApplyNotification($this->job));

        Mail::to($this->job->user->email)->send(new ApplyJob($mailData));

        broadcast(new StudentJobApplyEvent(trans('New application has been created!')));

        $this->alert('success', trans('Apply Success'));
        $this->redirect(HomePage::class, navigate: true);
    }

    #[Layout('layouts.user')]
    public function render(): View
    {
        return view('livewire.user.job.job-application');
    }
}