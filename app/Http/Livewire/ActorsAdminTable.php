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
        if ($this->search) {
            $actors =  Actor::where('name', 'like', '%' . $this->search . '%')->paginate(10);
        } else {
            $actors =  Actor::paginate(10);
        }
        return view('livewire.actors-admin-table')->with('actors', $actors);
    }
    public function deleteId($id)
    {
        $this->deleteId = $id;
    }
    public function deleteActor()
    {
        $actor = Actor::findOrFail($this->deleteId);
        $actor->deleteImage();
        $actor->delete();
        $this->emit('alert', ['type' => 'success', 'message' => 'Актьора е премахнат']);
    }
}
