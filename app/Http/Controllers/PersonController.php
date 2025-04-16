<?php

namespace App\Http\Controllers;

use App\Services\Person\PersonUpdateService;
use App\Http\Requests\UpdatePersonRequest;
use App\Services\Person\PersonService;
use App\Http\Resources\PersonResource;
use App\Models\Person;

class PersonController extends Controller
{
    public function __construct(
        protected PersonUpdateService $personUpdateService,
        protected PersonService       $personService,
    )
    {
    }

    public function index()
    {
        $person = $this->personService->getAllPersons();

        return $this->response(PersonResource::collection($person));
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
