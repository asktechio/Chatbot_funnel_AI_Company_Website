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
 * Sent to admin when a lead is captured via AI chat (CONTACT_COLLECTED).
 */
class LeadCapturedAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public ChatbotSalesSession $session,
    ) {}

    public function envelope(): Envelope
    {
        $name = $this->session->contact_name ?? 'Someone';
        $type = $this->session->business_type ?? 'a business';

        return new Envelope(
            subject: "New enquiry from {$name} ({$type}) — needs follow-up",
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.lead-captured-admin',
        );
    }
}
