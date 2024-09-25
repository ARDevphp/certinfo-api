<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Http\JsonResponse;

class CourseController extends Controller
{
    public function index(): JsonResponse
    {
        $courses = Course::withCount('students')->get(); // o'quvchilar sonini olish

        $data = $courses->map(function ($course) {
            return [
                'course_id' => $course->id,
                'course_name' => $course->name,
                'student_count' => $course->students()->count(), // students_count avtomatik tarzda hisoblanadi
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
            'course_duration' => $request->course_duration,
        ]);

        return "muafaqiyatli";
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
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
