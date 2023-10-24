<?php

namespace App\Livewire\Chat;

use App\Models\User;
use Livewire\Component;

class CreateChat extends Component
{
    public $users;
    public function render()
    {
        
        $this->users = User::where('id', '!=', auth()->user()->id)->get();

        return view('livewire.chat.create-chat');
    }
}
