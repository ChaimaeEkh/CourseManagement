<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'biography',
        'avatar',
        'website',
    ];

    //Un utilisateur peut avoir un seul profil (One-to-One)
    public function user(): BelongsTo 
    {
        return $this->belongsTo(User::class);
    }
}
