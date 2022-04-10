<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryTable extends Component
{
    public $deleteId;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['alert' => '$refresh'];

    public function render()
    {
        return view('livewire.category-table')->with('categories', Category::latest()->paginate(10));
    }
    public function deleteId($id)
    {
        $this->deleteId = $id;
    }
    public function deleteCategory()
    {
        Category::findOrFail($this->deleteId)->delete();
        $this->emit('alert', ['type' => 'success', 'message' => 'Жанра е премахнат']);
    }
}
