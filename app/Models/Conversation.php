<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Adventure;
use App\Models\User;
use App\Models\Message;

class Conversation extends Model
{
    use HasFactory;

    public function adventure()
    {
        return $this->belongsTo(Adventure::class);
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'conversation_user', 'conversation_id', 'user_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
