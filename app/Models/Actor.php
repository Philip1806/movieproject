<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getImageUrl()
    {
        if ($this->img) {
            return Storage::disk('public')->url($this->img);
        }
        return Storage::disk('public')->url('movies/no-image.jpg');
    }
    public static function getImageUrlByFilename(string $filename)
    {
        return Storage::disk('public')->url($filename);
    }

    public function deleteImage()
    {
        if (!$this->img) {
            return true;
        }
        Storage::disk('public')->delete($this->img);
        $this->img = null;
    }
    public static function processImage($imagePath)
    {
        $original_file = Storage::disk("public")->get($imagePath);
        $info = pathinfo($imagePath);
        $newfilename = $info['dirname'] . '/actor-' . time() . '.' . $info['extension'];

        $img = Image::make($original_file);
        if (extension_loaded('exif')) $img->orientate();
        $img->fit(280, 410, function ($constraint) {
            $constraint->upsize();
        })->interlace();
        $img->save(Storage::disk("public")->getAdapter()->getPathPrefix() . $newfilename, 80);
        Storage::disk("public")->delete($imagePath);
        return $newfilename;
    }
    public function getUrl()
    {
        return route('home.actors.show', $this->slug);
    }
}
