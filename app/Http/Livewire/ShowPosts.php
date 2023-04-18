<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class ShowPosts extends Component
{
    public $post;
    public $user;
    public $currentUser;


    public function mount($post, $currentUser)
    {
        $this->user = User::findOrFail($post->user_id);
        
       

    }


    public function render()
    { 
        return view('livewire.show-posts');
    }
}
