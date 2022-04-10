<?php

namespace App\Http\Livewire;

use App\Models\Actor;
use App\Models\Director;
use Livewire\Component;
use Illuminate\Support\Str;

class ActorsCreate extends Component
{
    public Actor $actor;
    public $date;
    public $imgUrl;
    public $imgFilename;

    protected $listeners = ['imageUploaded' => 'showImage'];

    protected $rules = [
        'actor.name' => 'required|min:2|max:250',
    ];
    public function showImage($filename)
    {
        $this->imgFilename = $filename;
        $this->imgUrl = Actor::getImageUrlByFilename($filename);
    }
    public function mount()
    {
        $this->actor = new Actor();
    }
    public function render()
    {
        return view('livewire.actors-create');
    }

    public function submit()
    {
        $this->validate();
        $this->actor->slug = Str::slug($this->actor->name) . rand(1, 9);
        try {
            $this->actor->birth_date = Director::convert_date($this->date);
        } catch (\Exception $e) {
            $this->emit('alert', ['type' => 'error', 'message' => 'Грешен формат на датата.', 'title' => "Дата:" . $this->date]);
            return;
        }
        if ($this->imgFilename) {
            $this->actor->img = $this->imgFilename;
        }
        $this->actor->user_id = auth()->user()->id;
        $this->actor->save();
        $this->emit('closeModal', "#addActor");
        $this->emit('alert', ['type' => 'success', 'message' => 'Актьора е добавен', 'title' => $this->actor->name]);
        $this->actor = new Actor();
        $this->imgUrl = null;
    }
}
