<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Page;
use App\Models\User;

class Group extends Model
{
    use HasFactory;

    public function page() 
    {
        return $this->belongsTo(Page::class);
    }

    public function Users()
    {
        return $this->belongsToMany(User::class);
    }
}
