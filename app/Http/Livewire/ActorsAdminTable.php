<?php

namespace App\Http\Livewire;

use App\Models\Actor;
use Livewire\Component;

class ActorsAdminTable extends Component
{
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $deleteId;
    protected $listeners = ['alert' => '$refresh'];

    public function render()
    {
        return view('livewire.actors-admin-table')->with('actors', Actor::paginate(10));
    }
    public function deleteId($id)
    {
        $this->deleteId = $id;
    }
    public function deleteActor()
    {
        Actor::findOrFail($this->deleteId)->delete();
        $this->emit('alert', ['type' => 'success', 'message' => 'Актьора е премахнат']);
    }
}
