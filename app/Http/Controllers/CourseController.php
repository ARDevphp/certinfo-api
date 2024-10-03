<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Http\Resources\TeacherResource;
use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Database\Seeders\TeacherSeeder;
use Illuminate\Http\JsonResponse;

class CourseController extends Controller
{
    public function index(): JsonResponse
    {
        $courses = Course::all(); // o'quvchilar sonini olish

        $data = $courses->map(function ($course) {
            return [
                'id' => $course->id,
                'name' => $course->name,
                'course_info' => $course->course_info,
                'photo_id' => $course->photo_id,
                'teacher_id' => TeacherResource::collection($course->teacher_id),
                'start_course' => $course->start_course,
                'course_duration' => $course->course_duration,
                'student_count' => $course->people_count,
            ];
        });

        return response()->json($data);
    }

    public function store(StoreCourseRequest $request)
    {

        Course::create([
            'name' => $request->name,
            'course_info' => $request->course_info,
            'start_course' => $request->start_course,
            'teacher_id' => $request->teacher_id,
            'image_id' => $request->image_id ? $request->image_id : 1,
            'course_duration' => $request->course_duration,
        ]);

        return "muafaqiyatli";
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return $this->response(new CourseResource($course));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
