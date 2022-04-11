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
        if ($this->search) {
            $directors =  Director::where('name', 'like', '%' . $this->search . '%')->paginate(10);
        } else {
            $directors =  Director::paginate(10);
        }
        return view('livewire.directors-admin-table')->with('directors', $directors);
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
