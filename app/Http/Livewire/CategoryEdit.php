<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryEdit extends Component
{
    public Category $category;

    protected $rules = [
        'category.name' => 'required',
        'category.slug' => 'required'
    ];
    public function render()
    {
        return view('livewire.category-edit');
    }
    public function submit()
    {
        $this->validate();
        $this->category->save();
        $this->emit('closeModal', "#editCategoryModal" . $this->category->id);
        $this->emit('alert', ['type' => 'success', 'message' => 'Жанра е редактиран', 'title' => $this->category->name]);
    }
}
