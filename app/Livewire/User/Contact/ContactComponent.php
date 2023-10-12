<?php

namespace App\Livewire\User\Contact;

use App\Mail\ContactUs;
use App\Repositories\SettingRepository;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Liên Hệ Với Chúng Tôi')]
class ContactComponent extends Component
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

    public function sendContact(): void
    {
        $validatedData = $this->validate();

        $repositories = new SettingRepository();

        $settings = $repositories->getAllSettings();

        Mail::to($settings['email'])
            ->send(new ContactUs($validatedData));
        $this->alert('success', trans('Send email success'));
        $this->reset();
    }

    #[Layout('layouts.user')]
    public function render(): View
    {
        return view('livewire.user.contact.contact-component');
    }
}
