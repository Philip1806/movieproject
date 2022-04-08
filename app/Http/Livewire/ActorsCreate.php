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
    protected $rules = [
        'actor.name' => 'required|min:2|max:250'
    ];

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
        $this->actor->save();
        $this->emit('alert', ['type' => 'success', 'message' => 'Актьора е добавен', 'title' => $this->actor->name]);
        $this->actor = new Actor();
    }
}
