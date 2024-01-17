<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin: userLevel =0, lecturer: userLevel=3, student: userLevel=5
        $users = [
            [
                'name'=>'Manager',
                'email'=>'manager@uniten.my',
                'password'=> bcrypt('manager'),
                'user_level' => 0
            ],
            [
                'name'=>'Lead Developer',
                'email'=>'leaddeveloper@uniten.my',
                'password'=> bcrypt('leaddeveloper'),
                'user_level' => 1
            ],
            [
                'name'=>'Developer',
                'email'=>'developer@uniten.my',
                'password'=> bcrypt('developer'),
                'user_level' => 2
            ],
            [
                'name'=>'BU',
                'email'=>'bu@uniten.edu.my',
                'password'=> bcrypt('bunit'),
                'user_level' => 3
            ],
        ];
        // foreach item in the $users array (above), create user
        foreach ($users as $key => $user) {
            User::create($user);
        }

    }
}
