<?php

namespace App\Http\Livewire;

use App\Models\Actor;
use App\Models\Director;
use Livewire\Component;

class ActorsEdit extends Component
{
    public Actor $actor;
    public $date;
    protected $rules = [
        'actor.name' => 'required'
    ];
    public function mount()
    {
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
        $this->actor->save();
        $this->emit('alert', ['type' => 'success', 'message' => 'Актьора е редактиран', 'title' => $this->actor->name]);
    }
}
