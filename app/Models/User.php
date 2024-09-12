<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relation with posts table
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    // Relation with captivatingMoments table
    public function captivatingMoments(): HasMany
    {
        return $this->hasMany(Captative::class);
    }

    // Relation with albums table
    public function albums(): HasMany
    {
        return $this->hasMany(Album::class);
    }
}
