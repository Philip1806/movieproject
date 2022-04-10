<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class CategoryCreate extends Component
{
    public $title;
    protected $rules = [
        'title' => 'required|min:2|max:250'
    ];
    public function render()
    {
        return view('livewire.category-create');
    }
    public function submit()
    {
        $this->validate();
        $genre = new Category();
        $genre->name = $this->title;
        $genre->slug = Str::slug($this->title) . rand(1, 9);
        $genre->save();
        $this->emit('alert', ['type' => 'success', 'message' => 'Жанра е добавен', 'title' => $this->title]);
        $this->reset();
    }
}
