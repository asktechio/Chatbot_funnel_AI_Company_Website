<?php

declare(strict_types=1);

namespace App\Mail;

use App\Models\ChatbotSalesSession;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * Acknowledgement email sent to the customer when their lead is captured via AI chat.
 */
class LeadCapturedCustomerMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public ChatbotSalesSession $session,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Hey, great chatting with you!',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.lead-captured-customer',
        );
    }
}
