<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Services\Person\PersonService;
use App\Http\Resources\PersonResource;
use App\Http\Requests\UpdatePersonRequest;
use App\Services\Person\PersonUpdateService;

class PersonController extends Controller
{
    public function __construct(
        protected PersonService $personService,
        protected PersonUpdateService $personUpdateService,
    )
    {
    }

    public function index()
    {
        $person = $this->personService->getAllPersons();

        return $this->response(PersonResource::collection($person), 200);
    }

    public function show($id)
    {
        $personOrUser = $this->personService->personOrUserResource($id);

        return $this->response($personOrUser, 200);
    }

    public function update(UpdatePersonRequest $request, $id)
    {
        $personOrUser = $this->personUpdateService->updatePerson($request->validated(), $id);

        return $this->response($personOrUser, 200);
    }

    public function destroy(Person $person)
    {
        $person->delete();

        return $this->response("Foydalanuvchini o'chirildi", 204);
    }
}
