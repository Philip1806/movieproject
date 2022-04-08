<?php

namespace App\Http\Livewire;

use App\Models\Director;
use Livewire\Component;
use Illuminate\Support\Str;

class DirectorsEdit extends Component
{
    public Director $director;
    public $date;
    protected $rules = [
        'director.name' => 'required'
    ];
    public function mount()
    {
        $this->date = $this->director->birth_date->format('d/m/Y');
    }
    public function render()
    {
        return view('livewire.directors-edit');
    }
    public function submit()
    {
        $this->validate();
        try {
            $this->director->birth_date = Director::convert_date($this->date);
        } catch (\Exception $e) {
            $this->emit('alert', ['type' => 'error', 'message' => 'Грешен формат на датата.']);
            return;
        }
        $this->director->save();
        $this->emit('alert', ['type' => 'success', 'message' => 'Режисьора е редактиран', 'title' => $this->director->name]);
    }
}
