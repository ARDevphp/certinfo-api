<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Http\JsonResponse;

class CourseController extends Controller
{
    public function index()
    {
        return $this->response(CourseResource::collection(Course::all()));
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

    public function show(Course $course)
    {
        return $this->response(new CourseResource($course));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        //
    }

    public function destroy(Course $course)
    {
        //
    }
}
