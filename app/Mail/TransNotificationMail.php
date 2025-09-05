<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TransNotificationMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $chat;
    public $feriApp;
    public $sender;
    public $recipient;
    public $company2;

    /**
     * Create a new message instance.
     */
    public function __construct($chat, $feriApp, $sender, $recipient, $company2)
    {
        $this->chat = $chat;
        $this->feriApp = $feriApp;
        $this->sender = $sender;
        $this->recipient = $recipient;
        $this->company2 = $company2;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(subject: 'New Query Alert');
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.TransNotification',
            with: [
                'chat' => $this->chat,
                'feriApp' => $this->feriApp,
                'sender' => $this->sender,
                'recipient' => $this->recipient,
                'company2' => $this->company2,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}