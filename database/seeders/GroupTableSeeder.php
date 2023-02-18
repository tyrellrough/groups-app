<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $group = new Group;
        $group->name = "Test group";
        $group->about = "Test group description";
        $group->image = "Test group image";
        $group->page_id = 1;
        $group->save();
        $group->Users()->attach(1);
    }
}
