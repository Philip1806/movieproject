<?php

namespace App\Http\Livewire;

use App\Models\Director;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class DirectorsAdminTable extends Component
{
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $deleteId;
    protected $listeners = ['alert' => '$refresh'];

    public function render()
    {
        return view('livewire.directors-admin-table')->with('directors', Director::paginate(10));
    }
    public function deleteId($id)
    {
        $this->deleteId = $id;
    }
    public function deleteDirector()
    {
        Director::findOrFail($this->deleteId)->delete();
        $this->emit('alert', ['type' => 'success', 'message' => 'Режисьора е премахнат']);
    }
}
