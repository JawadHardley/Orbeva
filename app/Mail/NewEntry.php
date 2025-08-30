<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewEntry extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $feriApp;
    public $vendor;
    public $transporter;

    /**
     * Create a new message instance.
     */
    public function __construct($feriApp, $vendor, $transporter)
    {
        $this->feriApp = $feriApp;
        $this->vendor = $vendor;
        $this->transporter = $transporter;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Entry',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.newentry',
            with: [
                'feriApp' => $this->feriApp,
                'vendor' => $this->vendor,
                'transporter' => $this->transporter,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}