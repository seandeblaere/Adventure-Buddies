<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Conversation;

class Adventure extends Model
{
    use HasFactory;

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function participants()
    {
        return $this->belongsToMany(User::class);
    }

    public function conversation()
    {
        return $this->hasOne(Conversation::class);
    }

    public function interestedUsers()
    {
        return $this->belongsToMany(User::class, 'interests', 'adventure_id', 'user_id');
    }

    public function isFull()
    {
        return $this->participants()->count() >= $this->capacity;
    }
}
