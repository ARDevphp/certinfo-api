<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

class CourseController extends Controller
{
    public function index()
    {
        return Course::all();
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
