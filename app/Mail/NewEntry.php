<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;


class NewEntry extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $feriApp;
    public $vendor;
    public $transporter;
    public $company2;

    /**
     * Create a new message instance.
     */
    public function __construct($feriApp, $vendor, $transporter, $company2)
    {
        $this->feriApp = $feriApp;
        $this->vendor = $vendor;
        $this->transporter = $transporter;
        $this->company2 = $company2;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Feri Application Submitted',
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
                'company2' => $this->company2,
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
        // Attach documents uploaded via $feriapp->documents_upload
        $fileFields = ['invoice', 'manifest', 'packing_list', 'customs']; // your predefined fields
        $uploadedFiles = json_decode($this->feriApp->documents_upload, true);

        if ($uploadedFiles && is_array($uploadedFiles)) {
            foreach ($fileFields as $field) {
                if (!empty($uploadedFiles[$field])) {
                    $fullPath = storage_path('app/private/' . $uploadedFiles[$field]);

                    if (file_exists($fullPath)) {
                        $attachments[] = Attachment::fromPath($fullPath)
                            ->as(ucfirst($field) . '.' . pathinfo($fullPath, PATHINFO_EXTENSION))
                            ->withMime(mime_content_type($fullPath));
                    }
                }
            }
        }

        return $attachments;
    }
}