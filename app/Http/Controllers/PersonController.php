<?php

namespace App\Http\Controllers;

use App\Http\Resources\PersonResource;
use App\Models\Person;
use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;

class PersonController extends Controller
{
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
        $person = Person::where('user_id', $id)->firstOrFail();
        return $this->response(new PersonResource($person));
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
