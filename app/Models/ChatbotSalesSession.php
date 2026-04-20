<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChatbotSalesSession extends Model
{
    protected $fillable = [
        'session_id',
        'chat_id',
        'business_type',
        'daily_enquiries',
        'channel',
        'after_hours',
        'contact_name',
        'whatsapp',
        'email',
        'business_name',
        'team_size',
        'monthly_volume',
        'runs_ads',
        'pain_points',
        'source',
        'total_turns',
        'status',
        'ip_address',
        'user_agent',
        'page_url',
        'referrer',
        'admin_notes',
    ];

    protected $casts = [
        'total_turns'  => 'integer',
        'pain_points'  => 'array',
    ];

    public function messages(): HasMany
    {
        return $this->hasMany(ChatbotSalesMessage::class, 'chat_id', 'chat_id')
                    ->orderBy('created_at');
    }
}
