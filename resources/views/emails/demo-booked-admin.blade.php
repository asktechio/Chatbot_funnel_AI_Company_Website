<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Booked — Admin Alert</title>
    <style>
        body { margin: 0; padding: 0; background-color: #f4f4f7; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; }
        .wrapper { max-width: 600px; margin: 0 auto; padding: 20px; }
        .card { background: #ffffff; border-radius: 12px; padding: 32px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        .header { text-align: center; margin-bottom: 24px; }
        .header h1 { color: #1e293b; font-size: 22px; margin: 0 0 8px; }
        .header p { color: #64748b; font-size: 14px; margin: 0; }
        .badge { display: inline-block; background: #dcfce7; color: #166534; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; margin-bottom: 16px; }
        .cta { display: inline-block; background: #16a34a; color: #ffffff; padding: 12px 28px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 14px; margin-top: 20px; }
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
                <span class="badge">🎯 DEMO BOOKED</span>
                <h1>New Demo Booking!</h1>
                <p>A visitor has completed the booking form and wants a live demo.</p>
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
                    <td class="label">Business Name</td>
                    <td class="value">{{ $session->business_name ?? 'Not provided' }}</td>
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
                    <td class="label">Team Size</td>
                    <td class="value">{{ $session->team_size ?? 'Not specified' }}</td>
                </tr>
                <tr>
                    <td class="label">Monthly Volume</td>
                    <td class="value">{{ $session->monthly_volume ?? 'Not specified' }}</td>
                </tr>
                <tr>
                    <td class="label">Runs Ads</td>
                    <td class="value">{{ $session->runs_ads ?? 'Not specified' }}</td>
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
                    <td class="label">Status</td>
                    <td class="value" style="color: #16a34a; font-weight: 600;">Demo Booked ✓</td>
                </tr>
                <tr>
                    <td class="label">Booked At</td>
                    <td class="value">{{ $session->updated_at?->format('d M Y, h:i A') ?? now()->format('d M Y, h:i A') }}</td>
                </tr>
            </table>

            <div style="text-align: center;">
                <a href="{{ url('/admin/leads/' . $session->id) }}" class="cta">View in Admin Panel →</a>
            </div>
        </div>

        <div class="footer">
            <p>EINOVATECH — AI Customer Automation Platform</p>
            <p>This is an automated notification from chatbot.einovatech.com</p>
        </div>
    </div>
</body>
</html>
