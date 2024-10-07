<?php

namespace App\Http\Controllers;

use App\Http\Resources\TeacherResource;
use App\Models\Teacher;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;

class TeacherController extends Controller
{
    public function index()
    {
        return $this->response(TeacherResource::collection(Teacher::all()));
    }

    public function store(StoreTeacherRequest $request)
    {
        //
    }

    public function show(Teacher $teacher)
    {
        //
    }

    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        //
    }

    public function destroy(Teacher $teacher)
    {
        //
    }
}
