<?php

namespace App\Http\Livewire;

use App\Models\Actor;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImageUpload extends Component
{

    use WithFileUploads;

    public $photo;
    protected $rules = [
        'photo' => 'image|max:4024',
    ];

    public function render()
    {
        return view('livewire.image-upload');
    }
    public function submit()
    {
        $this->validate();
        $this->emitUp('imageUploaded', Actor::processImage($this->photo->store("actors", 'public')));
        $this->reset();
        $this->emit('alert', ['type' => 'info', 'message' => 'Снимката е качена и запазена.']);
    }
}
