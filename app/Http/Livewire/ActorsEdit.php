<?php

namespace App\Http\Livewire;

use App\Models\Actor;
use App\Models\Director;
use Livewire\Component;

class ActorsEdit extends Component
{
    public Actor $actor;
    public $date;
    public $imgUrl;
    public $imgFilename;
    protected $rules = [
        'actor.name' => 'required'
    ];
    protected $listeners = ['imageUploaded' => 'showImage'];

    public function showImage($filename)
    {
        $this->imgFilename = $filename;
        $this->imgUrl = Actor::getImageUrlByFilename($filename);
    }
    public function mount()
    {
        if ($this->actor->img) {
            $this->imgFilename = $this->actor->img;
            $this->imgUrl = $this->actor->getImageUrl();
        }
        $this->date = $this->actor->birth_date->format('d/m/Y');
    }
    public function render()
    {
        return view('livewire.actors-edit');
    }
    public function submit()
    {
        $this->validate();
        try {
            $this->actor->birth_date = Director::convert_date($this->date);
        } catch (\Exception $e) {
            $this->emit('alert', ['type' => 'error', 'message' => 'Грешен формат на датата.']);
            return;
        }
        if ($this->imgFilename) {
            $this->actor->deleteImage();
            $this->actor->img = $this->imgFilename;
        }
        $this->actor->save();
        $this->emit('alert', ['type' => 'success', 'message' => 'Актьора е редактиран', 'title' => $this->actor->name]);
    }
}
