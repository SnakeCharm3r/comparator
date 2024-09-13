<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApprovalRequestNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $approver;
    public $requestDetails;


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Approval Request Notification',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.approval_request_notification',
            with: [
                'approver' => $this->approver,
                'requestDetails' => $this->requestDetails,
            ]
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
