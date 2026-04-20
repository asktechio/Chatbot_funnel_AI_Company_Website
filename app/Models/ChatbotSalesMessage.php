<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChatbotSalesMessage extends Model
{
    protected $fillable = [
        'chat_id',
        'role',
        'content',
        'turn_number',
    ];

    protected $casts = [
        'turn_number' => 'integer',
    ];

    public function session(): BelongsTo
    {
        return $this->belongsTo(ChatbotSalesSession::class, 'chat_id', 'chat_id');
    }
}
