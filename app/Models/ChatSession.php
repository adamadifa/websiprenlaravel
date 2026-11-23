<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChatSession extends Model
{
    protected $fillable = [
        'session_token',
        'ip_address',
        'user_agent',
        'page_origin',
        'started_at',
        'last_active_at',
        'message_count',
    ];

    protected $casts = [
        'started_at'     => 'datetime',
        'last_active_at' => 'datetime',
    ];

    public function messages(): HasMany
    {
        return $this->hasMany(ChatMessage::class);
    }
}
