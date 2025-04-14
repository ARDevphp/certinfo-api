<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCourseRequest;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Resources\CourseResource;
use App\Services\Course\CourseService;
use Illuminate\Http\JsonResponse;
use App\Models\Course;

class CourseController extends Controller
{
    public function __construct(protected CourseService $courseService)
    {
    }

    public function index()
    {
        return $this->response(CourseResource::collection($this->courseService->allShow()), 200);
    }

    public function store(StoreCourseRequest $request)
    {
        $course = $this->courseService->createCourse($request->validated());

        return $this->response([
            'message' => 'Kurs muvaffaqiyatli yaratildi!',
            'course' => new CourseResource($course)
        ], 201);
    }

    public function show(Course $course)
    {
        return $this->response(new CourseResource($course), 200);
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->validated());

        return $this->response([
            'message' => 'Kurs muvaffaqiyatli yangilandi!',
            'course' => new CourseResource($course)
        ], 200);
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return $this->response('Kurs muvaffaqiyatli o\'chirildi!', 204);
    }
}
