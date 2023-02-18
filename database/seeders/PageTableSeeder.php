<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Page;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $page = new Page;
        $page->name = "testingPage";
        $page->save();

        $page2 = new Page;
        $page2->name = "testingPage2";
        $page2->save();
        
        //factory call will go here.
    }
}
