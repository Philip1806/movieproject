<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserEdit extends Component
{
    public User $user;
    public $newPassword;

    protected $rules = [
        'user.name' => 'required|max:100'
    ];
    public function mount()
    {
        $this->user = auth()->user();
    }
    public function render()
    {
        return view('livewire.user-edit');
    }
    public function submit()
    {
        $this->validate();
        if ($this->newPassword) {
            $this->user->password = Hash::make($this->newPassword);
        }
        $this->user->slug = Str::slug($this->user->name);
        $this->user->save();
        $this->emit('alert', ['type' => 'success', 'message' => 'Промените са записани', 'title' => $this->user->name]);
        $this->emit('closeModal', '#editProfile');
    }
}
