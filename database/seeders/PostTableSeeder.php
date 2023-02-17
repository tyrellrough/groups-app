<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $post = new Post;
        $post->text = "This is default testing text.";
        $post->image = "nothing here for now...";
        $post->page_id = 1;
        $post->save();

        //factory call will go here.
    }
}
