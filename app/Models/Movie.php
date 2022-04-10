<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use File;

class Movie extends Model
{
    use HasFactory;
    protected $table = 'movies';
    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'movie_cast', 'movie_id', 'cast_id');
    }
    public function director()
    {
        return $this->belongsTo(Director::class);
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

    public function deleteImage()
    {
        if (!$this->img) {
            return true;
        }
        Storage::disk('public')->delete($this->img);
        $this->img = null;
    }
    public static function saveImage($uploadedImage)
    {
        $folder = 'movies';
        $newImageName = '/' . time() . '.' . $uploadedImage->getClientOriginalExtension();
        $outputDirectoryPath = Storage::disk('public')->path($folder);
        if (!File::isDirectory($outputDirectoryPath)) {
            File::makeDirectory($outputDirectoryPath);
        }
        $img = Image::make($uploadedImage->getRealPath());
        if (extension_loaded('exif')) $img->orientate();
        $img->fit(280, 410, function ($constraint) {
            $constraint->upsize();
        })->interlace();

        $img->save($outputDirectoryPath . $newImageName, 75);
        return $folder . $newImageName;
    }
}
