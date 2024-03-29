<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class ShowComments extends Component
{
    public $comment;
    public $user;
    public $currentUser;

    public function mount($comment, $currentUser)
    {
        $this->user = User::findOrFail($comment->user_id);
        
    }
    public function render()
    {
        return view('livewire.show-comments');
    }
}
