<?php

namespace App\Livewire\User\Job\Detail;

use App\Models\Job;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;

class JobContact extends Component
{
    use LivewireAlert;

    #[Rule('required|string|max:32')]
    public string $name;

    #[Rule('required|string|email')]
    public string $email;

    #[Rule('required|max:255')]
    public string $subject;

    #[Rule('required|string')]
    public string $message;

    public mixed $jobId;

    public function sendContact(): void
    {
        $validatedData = $this->validate();

        $job = Job::where('id', $this->jobId)
            ->with('user')
            ->first();

        $mailData = array_merge(['companyName' => $job->user->name], $validatedData);

        Mail::to($job->user->email)
            ->send(new \App\Mail\ContactJob($mailData));
        $this->alert('success', trans('Send email success'));
        $this->reset();
    }

    public function render(): View
    {
        return view('livewire.user.job.detail.job-contact');
    }
}
