<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin:0; padding:0; background:#fff; font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif; color:#222; font-size:15px; line-height:1.7;">
    <div style="max-width:560px; margin:0 auto; padding:28px 16px;">

        <p>Hi {{ $session->contact_name ?? 'there' }},</p>

        <p>This is Vimal from EINOVATECH — thanks for booking a demo! Really glad you're interested.</p>

        <p>I wanted to quickly let you know what happens next:</p>

        <p>One of our team members will reach out to you on WhatsApp{{ $session->whatsapp ? ' (' . $session->whatsapp . ')' : '' }} within a couple of hours to find a slot that works for you. The call itself is just 15 minutes — we'll set up the AI specifically for your {{ $session->business_type ?? 'business' }} scenario and walk you through it live. No slides, no generic pitch. You'll actually see it handling conversations, booking appointments, and qualifying leads in real time.</p>

        <p>If you have any questions in the meantime, just reply to this email or drop me a message on <a href="https://wa.me/919243077840" style="color:#2563eb;">WhatsApp</a>. Always happy to chat.</p>

        <p>Looking forward to showing you what this can do for your business!</p>

        <p>
            Cheers,<br>
            <strong>Vimal</strong><br>
            <span style="color:#666; font-size:13px;">EINOVATECH — AI Customer Automation</span><br>
            <span style="color:#666; font-size:13px;"><a href="https://chatbot.einovatech.com" style="color:#2563eb; text-decoration:none;">chatbot.einovatech.com</a> · +91 92430 77840</span>
        </p>

    </div>
</body>
</html>
