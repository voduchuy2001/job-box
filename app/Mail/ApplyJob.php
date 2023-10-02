<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApplyJob extends Mailable
{
    use Queueable;
    use SerializesModels;

    public array $mailData;

    public function __construct(array $mailData)
    {
        $this->mailData = $mailData;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: $this->mailData['email'],
            subject: $this->mailData['subject'],
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'email.apply-job',
            with: [
                'companyName' => $this->mailData['companyName'],
                'presentation' => $this->mailData['presentation'],
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
