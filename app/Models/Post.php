<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Page;
use App\Models\Comment;
use App\Models\Image;

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

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function image() 
    {
        return $this->hasOne(Image::class);
    }


}
