<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Adventure;
use App\Models\Conversation;
use App\Models\Message;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function adventures()
    {
        return $this->hasMany(Adventure::class);
    }

    public function participatedAdventures()
    {
        return $this->belongsToMany(Adventure::class);
    }

    public function conversations()
    {
        return $this->belongsToMany(Conversation::class, 'conversation_user', 'user_id', 'conversation_id');
    }
    
    public function interests()
    {
        return $this->belongsToMany(Adventure::class, 'interests', 'user_id', 'adventure_id');
    }

    public function message()
    {
        return $this->hasOne(Message::class);
    }
}
