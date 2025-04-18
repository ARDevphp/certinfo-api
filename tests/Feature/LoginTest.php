<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_login_with_correct(): void
    {
        $user = User::factory()->create([
            'email' => 'aziz@gmail.com',
            'password' => bcrypt('121212aziz')
        ]);

        $response = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => '121212aziz'
        ]);

        $response->assertStatus(201);
    }
}
