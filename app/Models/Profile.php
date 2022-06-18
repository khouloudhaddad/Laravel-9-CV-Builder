<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function experiences():HasMany
    {
        return $this->hasMany(Experience::class);
    }

    public function links():HasMany
    {
        return $this->hasMany(Link::class);
    }
}
