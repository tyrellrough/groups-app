<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\Group;

class Page extends Model
{
    use HasFactory;

    public function posts() 
    {
        return $this->hasMany(Post::class);
    }

    public function group() 
    {
        return $this->hasOne(Group::class);
    }

}
