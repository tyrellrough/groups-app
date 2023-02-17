<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Page;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;

    public function page() 
    {
        return $this->belongsTo(Page::class);
    }

    public function comments() 
    {
        return $this->hasMany(Comment::class);
    }
}
