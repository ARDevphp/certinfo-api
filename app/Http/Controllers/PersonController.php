<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Photo;
use App\Models\Person;
use App\Http\Resources\UserResource;
use App\Http\Resources\PersonResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdatePersonRequest;

class PersonController extends Controller
{
    public function index()
    {
        return $this->response(PersonResource::collection(Person::all()));
    }

    public function show($id)
    {
        $person = Person::where('user_id', $id)->first();

        if ($person) {
            return $this->response(new PersonResource($person));
        }

        $user = User::where('id', $id)->firstOrFail();

        return $this->response(new UserResource($user));
    }


    public function update(UpdatePersonRequest $request, $id)
    {
        try {
            $person = Person::find($id);
            if ($person) {
                $user = User::find($person->user_id);
            } else {
                $user = User::find($request->id);
            }

            if (!$user) {
                return response()->json(['error' => 'User not found'], 404);
            }


            if ($request->newPhoto_id) {

                if ($request->oldPhoto_id !== null) {
                    $oldPhoto = Photo::find($request->oldPhoto_id);
                    $oldPath = 'public/' . $oldPhoto->path;

                    if ($oldPhoto->path && Storage::disk('local')->exists($oldPath)) {
                        Storage::disk('local')->delete($oldPath);

                        $oldPhoto->delete();
                    }
                }

                $person->photo_id = $request->newPhoto_id;
            }

            if (!$person) {
                $pr = Person::create([
                    'user_id' => $user->id,
                    'photo_id' => $request->newPhoto_id ?? 1,
                    'firstname' => $request->firstname,
                    'lastname' => $request->lastname,
                    'birthday' => '2021-09-09',
                    'created_at' => Carbon::now()->toDateTimeString(),
                ]);

                return response()->json(['pr_id' => $pr, 'message' => "Foydalanuvchini yangi ism familyasi qo'shildi"]);
            }

            if ($user->email !== $request->email) {
                $user->update(['email' => $request->email]);
            }

            $person->update($request->validated());

            return response()->json(['message' => "Foydalanuvchini ism familyasi o'zgartirildi"]);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    public function destroy(Person $person)
    {
        $person->delete();

        return response()->json(['message' => "Foydalanuvchini o'chirildi"]);
    }
}
