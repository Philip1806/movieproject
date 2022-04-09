<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $table = 'movies';
    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'movie_cast', 'movie_id', 'cast_id');
    }
}
