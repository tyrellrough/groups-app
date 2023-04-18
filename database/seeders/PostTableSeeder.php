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
        $post->user_id = 1;
        $post->save();

        $post2 = new Post;
        $post2->text = "Post 2";
        $post2->image = "nothing here for now...";
        $post2->page_id = 2;
        $post2->user_id = 2;
        $post2->save();



        Post::factory()->count(198)->create();
    }
}
