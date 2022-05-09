<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Director extends Model
{
    use HasFactory;
    protected $table = 'directors';
    public $timestamps = false;
    protected $dates = ['birth_date'];
    public function movies()
    {
        return $this->hasMany(Movie::class, 'director_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public static function convert_date($unformated_date, $del = "/", $carbon = false)
    {
        $dateString = explode($del, $unformated_date);

        $date = Carbon::createFromDate($dateString[2], $dateString[1], $dateString[0]);
        if (isset($dateString[3])) {
            $date->hour = $dateString[3];
        }
        if (isset($dateString[4])) {
            $date->minute = $dateString[4];
        }
        if (isset($dateString[5])) {
            $date->second = $dateString[5];
        }

        if ($carbon) {
            return $date;
        } else {
            return $date->toDateTimeString();
        }
    }
    public function getUrl()
    {
        return route('home.directors.show', $this->slug);
    }
}
