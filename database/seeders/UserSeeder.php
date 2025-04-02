<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'email' => "aziz@gmail.com",
            'password' => Hash::make('123456')
        ]);
        $user->assignRole('teacher');

        $user = User::create([
            'email' => "mirzo@gmail.com",
            'password' => Hash::make('123456')
        ]);
        $user->assignRole('admin');

        $user = User::create([//3
            'email' => "sardor@gmail.com",
            'password' => Hash::make('123456')
        ]);
        $user->assignRole('teacher');

        $user = User::create([
            'email' => "abdulzazmirzayev@gmail.com",
            'password' => Hash::make('123456')
        ]);
        $user->assignRole('admin');

        $user = User::create([//4
            'email' => "obid@gmail.com",
            'password' => Hash::make('123456')
        ]);
        $user->assignRole('teacher');

        $user = User::create([//5
            'email' => "dilo@gmail.com",
            'password' => Hash::make('123456')
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'email' => "abmirzo@gmail.com",
            'password' => Hash::make('123456')
        ]);
        $user->assignRole('admin');

        $users = User::factory()->count(200)->create();

        foreach ($users as $user) {
            $user->assignRole('student');
        }
    }
}
