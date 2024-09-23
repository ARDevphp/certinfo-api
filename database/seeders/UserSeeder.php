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
        $user->assignRole('admin');

        $user = User::create([
            'email' => "mirzo@gmail.com",
            'password' => Hash::make('123456')
        ]);
        $user->assignRole('admin');

        $users = User::factory()->count(200)->create();

        foreach ($users as $user) {
            $user->assignRole('student');
        }
    }
}
