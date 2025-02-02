<?php

namespace App\Http\Controllers;

use App\Http\Resources\CoursePersonResource;
use App\Models\Course;
use App\Models\CoursePerson;
use App\Http\Requests\StoreCoursePersonRequest;
use App\Http\Requests\UpdateCoursePersonRequest;

class CoursePersonController extends Controller
{
    public function index()
    {
        return response()->json(CoursePersonResource::collection(CoursePerson::all()), 200);
    }

    public function create()
    {
        return response()->json(['message' => 'Yangi kurs shaxsini yaratish'], 200);
    }

    public function store(StoreCoursePersonRequest $request)
    {
        $coursePerson = CoursePerson::create($request->validated());

        return response()->json([
            'message' => 'Kurs shaxsi muvaffaqiyatli yaratildi!',
            'course_person' => new CoursePersonResource($coursePerson)
        ], 201);
    }

    public function show($id)
    {
        $course = Course::with('people')->find($id);

        return response()->json(new CoursePersonResource($course), 200);
    }

    public function update(UpdateCoursePersonRequest $request, CoursePerson $coursePerson)
    {
        $coursePerson->update($request->validated());

        return response()->json([
            'message' => 'Kurs shaxsi muvaffaqiyatli yangilandi!',
            'course_person' => new CoursePersonResource($coursePerson)
        ], 200);
    }

    public function destroy(CoursePerson $coursePerson)
    {
        $coursePerson->delete();

        return response()->json(['message' => 'Kurs shaxsi muvaffaqiyatli o\'chirildi!'], 200);
    }
}

