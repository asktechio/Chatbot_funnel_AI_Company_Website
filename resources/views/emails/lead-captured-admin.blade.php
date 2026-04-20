<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Lead Captured</title>
    <style>
        body { margin: 0; padding: 0; background-color: #f4f4f7; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; }
        .wrapper { max-width: 600px; margin: 0 auto; padding: 20px; }
        .card { background: #ffffff; border-radius: 12px; padding: 32px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        .header { text-align: center; margin-bottom: 24px; }
        .header h1 { color: #1e293b; font-size: 22px; margin: 0 0 8px; }
        .header p { color: #64748b; font-size: 14px; margin: 0; }
        .badge { display: inline-block; background: #fef3c7; color: #92400e; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; margin-bottom: 16px; }
        .detail-row { display: flex; padding: 10px 0; border-bottom: 1px solid #f1f5f9; }
        .detail-label { color: #64748b; font-size: 13px; font-weight: 600; width: 140px; min-width: 140px; }
        .detail-value { color: #1e293b; font-size: 14px; }
        .cta { display: inline-block; background: #2563eb; color: #ffffff; padding: 12px 28px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 14px; margin-top: 20px; }
        .footer { text-align: center; margin-top: 24px; color: #94a3b8; font-size: 12px; }
        table.details { width: 100%; border-collapse: collapse; }
        table.details td { padding: 10px 0; border-bottom: 1px solid #f1f5f9; vertical-align: top; }
        table.details td.label { color: #64748b; font-size: 13px; font-weight: 600; width: 140px; }
        table.details td.value { color: #1e293b; font-size: 14px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="card">
            <div class="header">
                <span class="badge">🔔 LEAD CAPTURED</span>
                <h1>New Lead from AI Chatbot</h1>
                <p>A visitor shared their contact details via the AI chat.</p>
            </div>

            <table class="details">
                <tr>
                    <td class="label">Name</td>
                    <td class="value">{{ $session->contact_name ?? 'Not provided' }}</td>
                </tr>
                <tr>
                    <td class="label">WhatsApp</td>
                    <td class="value">{{ $session->whatsapp ?? 'Not provided' }}</td>
                </tr>
                <tr>
                    <td class="label">Email</td>
                    <td class="value">{{ $session->email ?? 'Not provided' }}</td>
                </tr>
                <tr>
                    <td class="label">Business Type</td>
                    <td class="value">{{ $session->business_type ?? 'Not specified' }}</td>
                </tr>
                <tr>
                    <td class="label">Daily Enquiries</td>
                    <td class="value">{{ $session->daily_enquiries ?? 'Not specified' }}</td>
                </tr>
                <tr>
                    <td class="label">Channel</td>
                    <td class="value">{{ $session->channel ?? 'Not specified' }}</td>
                </tr>
                <tr>
                    <td class="label">After Hours</td>
                    <td class="value">{{ $session->after_hours ?? 'Not specified' }}</td>
                </tr>
                @if($session->pain_points && is_array($session->pain_points))
                <tr>
                    <td class="label">Pain Points</td>
                    <td class="value">{{ implode(', ', $session->pain_points) }}</td>
                </tr>
                @endif
                <tr>
                    <td class="label">Source</td>
                    <td class="value">{{ $session->source ?? 'inline_chat' }}</td>
                </tr>
                <tr>
                    <td class="label">Page URL</td>
                    <td class="value">{{ $session->page_url ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label">Captured At</td>
                    <td class="value">{{ $session->updated_at?->format('d M Y, h:i A') ?? now()->format('d M Y, h:i A') }}</td>
                </tr>
            </table>

            <div style="text-align: center;">
                <a href="{{ url('/admin/leads/' . $session->id) }}" class="cta">View Lead in Admin →</a>
            </div>
        </div>

        <div class="footer">
            <p>HYLUMINIX — AI Customer Automation Platform</p>
            <p>This is an automated notification from chatbot.hyluminix.com</p>
        </div>
    </div>
</body>
</html>
