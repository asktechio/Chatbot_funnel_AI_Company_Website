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
 * Confirmation email sent to the customer when they book a demo.
 */
class DemoBookedCustomerMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public ChatbotSalesSession $session,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Quick note about your demo request',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.demo-booked-customer',
        );
    }
}
