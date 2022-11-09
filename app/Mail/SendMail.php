<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $maildata;

    public function __construct($maildata)
    {
        $this->maildata = $maildata;
    }
    public function build()
    {
        return $this->markdown('emails.sendMail')
                ->with('maildata', $this->maildata);
    }
    public function envelope()
    {
        return new Envelope(
            subject: 'Send Mail',
        );
    }
    public function content()
    {
        return new Content(
            markdown: 'emails.sendMail',
        );
    }
    public function attachments()
    {
        return [];
    }
}
