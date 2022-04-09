<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;
    protected $table = 'cast';
    public $timestamps = false;
    protected $dates = ['birth_date'];
    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movie_cast', 'cast_id', 'movie_id');
    }
}
