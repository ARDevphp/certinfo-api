<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Http\JsonResponse;

class CourseController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(CourseResource::collection(Course::all()), 200);
    }

    public function store(StoreCourseRequest $request): JsonResponse
    {
        $course = Course::create($request->validated());

        return response()->json([
            'message' => 'Kurs muvaffaqiyatli yaratildi!',
            'course' => new CourseResource($course)
        ], 201);
    }

    public function show(Course $course): JsonResponse
    {
        return response()->json(new CourseResource($course), 200);
    }

    public function update(UpdateCourseRequest $request, Course $course): JsonResponse
    {
        $course->update($request->validated());

        return response()->json([
            'message' => 'Kurs muvaffaqiyatli yangilandi!',
            'course' => new CourseResource($course)
        ], 200);
    }

    public function destroy(Course $course): JsonResponse
    {
        $course->delete();

        return response()->json(['message' => 'Kurs muvaffaqiyatli o\'chirildi!'], 200);
    }
}
