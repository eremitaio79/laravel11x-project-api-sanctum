<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Add user.
        $user = new User();
        $user->name = 'Paulo Eremita';
        $user->email = 'pauloeremita@gmail.com';
        $user->password = bcrypt('Qwerty123');
        $user->save();
    }
}
