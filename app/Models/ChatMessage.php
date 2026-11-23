<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChatMessage extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'chat_session_id',
        'role',
        'message',
        'ai_provider',
        'context_retrieved',
        'response_time_ms',
        'created_at',
    ];

    protected $casts = [
        'context_retrieved' => 'boolean',
        'created_at'        => 'datetime',
    ];

    public function session(): BelongsTo
    {
        return $this->belongsTo(ChatSession::class, 'chat_session_id');
    }
}
