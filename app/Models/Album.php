<?php

// app/Models/Album.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon; // Import Carbon

class Album extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'image',
        'release_date',
    ];

    protected $casts = [
        'release_date' => 'datetime', // Cast release_date to a Carbon instance
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

