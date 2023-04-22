<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User;
        $user->name = "test user";
        $user->email = "testuser@email.com";
        $user->email_verified_at = now();
        $user->password ='$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
        $user->remember_token = "irkmkkdjeu";
        $user->isAdmin = false;
        $user->save();

        $admin = new User;
        $admin->name = "admin";
        $admin->email = "admin@email.com";
        $admin->email_verified_at = now();
        $admin->password ='$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
        $admin->remember_token = "irkmkkpjeu";
        $admin->isAdmin = true;
        $admin->save();
        



        User::factory()->count(50)->create();
    }
}
