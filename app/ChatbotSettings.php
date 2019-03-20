<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Chatbot Settings Model
 *
 * Used to access the chatbot settings
 */
class ChatbotSettings extends Model
{
    protected $fillable = ['name', 'setting'];
}
