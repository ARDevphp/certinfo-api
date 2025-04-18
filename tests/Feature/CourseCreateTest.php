<?php

namespace Tests\Feature;

use App\Models\Person;
use App\Models\Photo;
use App\Models\Teacher;
use Carbon\Carbon;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CourseCreateTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_create_course()
    {
        $admin = User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);

        $photo = Photo::factory()->create([
            'path' => 'photo.jpg'
        ]);

        $people = Person::factory()->create([
            'user_id' => $admin->id,
            'photo_id' => $photo->id,
            'firstname' => 'Aziz',
            'lastname' => 'Ahmed',
            'birthday' => '1990-01-01',
        ]);

        $ustoz = Teacher::factory()->create([
            'people_id' => $people->id,
            'photo_id' => $photo->id,
            'phone' => '+99898909090',
            'information' => 'php mentor 1 yil tajribasi bor',
            'address' => 'sasassasass',
            'salary' => 111111,
        ]);

        $startCourse = now()->toDateTimeString();

        $response = $this->actingAs($admin)->postJson( '/api/courses', [
            'name' => 'Test PHP',
            'course_info' => 'php kursi yangi',
            'teacher_id' => $ustoz->id,
            'photo_id' => 1,
            'start_course' => $startCourse,
            'course_duration' => '6 oy'
        ]);

        $response->assertStatus(201);
    }
}
