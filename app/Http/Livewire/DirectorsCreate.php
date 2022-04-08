<?php

namespace App\Http\Livewire;

use App\Models\Director;
use Livewire\Component;
use Illuminate\Support\Str;


class DirectorsCreate extends Component
{
    public Director $director;
    public $date;
    protected $rules = [
        'director.name' => 'required|min:2|max:250'
    ];

    public function mount()
    {
        $this->director = new Director();
    }
    public function render()
    {
        return view('livewire.directors-create');
    }

    public function submit()
    {
        $this->validate();
        $this->director->slug = Str::slug($this->director->name) . rand(1, 9);
        try {
            $this->director->birth_date = Director::convert_date($this->date);
        } catch (\Exception $e) {
            $this->emit('alert', ['type' => 'error', 'message' => 'Грешен формат на датата.', 'title' => "date:" . $this->date]);
            return;
        }

        $this->director->save();
        $this->emit('alert', ['type' => 'success', 'message' => 'Режисьора е добавен', 'title' => $this->director->name]);
    }
}
