<?php

namespace App\Http\Controllers;

use App\Http\Resources\PersonResource;
use App\Http\Resources\TeacherResource;
use App\Models\Person;
use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use App\Models\Teacher;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->response(PersonResource::collection(Person::all()));
    }


    public function store(StorePersonRequest $request)
    {
        //
    }

    public function show($id)
    {
        return $this->response(new PersonResource(Person::where('id', $id)->first()));
    }


    public function update(UpdatePersonRequest $request, Person $person)
    {
        //
    }

    public function destroy(Person $person)
    {
        //
    }
}
