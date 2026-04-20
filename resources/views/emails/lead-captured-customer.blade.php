<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin:0; padding:0; background:#fff; font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif; color:#222; font-size:15px; line-height:1.7;">
    <div style="max-width:560px; margin:0 auto; padding:28px 16px;">

        <p>Hi {{ $session->contact_name ?? 'there' }},</p>

        <p>Vimal here, from HYLUMINIX. Thanks for chatting with us — it was great learning a bit about your {{ $session->business_type ?? 'business' }}.</p>

        <p>I've passed your details to our team. Someone will drop you a WhatsApp message{{ $session->whatsapp ? ' on ' . $session->whatsapp : '' }} in the next couple of hours to set up a quick 15-minute demo call — totally free, no strings attached.</p>

        <p>In the meantime, if anything's on your mind, just reply here or ping me on <a href="https://wa.me/919243077840" style="color:#2563eb;">WhatsApp</a>. I'm around.</p>

        <p>Talk soon!</p>

        <p>
            — <strong>Vimal</strong><br>
            <span style="color:#666; font-size:13px;">HYLUMINIX — AI Customer Automation</span><br>
            <span style="color:#666; font-size:13px;"><a href="https://chatbot.hyluminix.com" style="color:#2563eb; text-decoration:none;">chatbot.hyluminix.com</a> · +91 92430 77840</span>
        </p>

    </div>
</body>
</html>
