<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MyEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }


    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         // subject: $this->title,
    //         subject: 'Contact',
    //     );
    // }


    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'mail_content',
    //     );
    // }

    // /**
    //  * Get the attachments for the message.
    //  *
    //  * @return array<int, \Illuminate\Mail\Mailables\Attachment>
    //  */
    // public function attachments(): array
    // {
    //     return [];
    // }
    public function build()
    {
        return $this->from($this->data['email'])
                    ->subject('New Contact Form Submission')
                    ->view('mail_content')
                    ->with('data', $this->data);
    }
}
