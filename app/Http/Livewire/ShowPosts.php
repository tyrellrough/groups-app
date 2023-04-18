<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class ShowPosts extends Component
{
    public $post;
    public $user;


    public function mount($post)
    {
      
        $this->user = User::findOrFail($post->user_id);
        
       

    }


    public function render()
    { 
        return view('livewire.show-posts');
    }
}
