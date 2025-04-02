<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CourseCreateTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_create_course()
    {
        $admin = User::factory()->create([
            'email' => 'admin@admin.com',
        ])->assignRole('admin');

        $response = $this->actingAs($admin)->json('POST', '/api/courses', [

        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('courses', [
            'name' => 'Test Course',
        ]);
    }


}
