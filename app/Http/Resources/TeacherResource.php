<?php

namespace App\Http\Resources;

use App\Models\Person;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeacherResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'people_id' => PersonResource::collection(Person::whereId($this->people_id)->get()),
            'phone' => $this->phone,
            'phone_id' => PhotoResource::collection(Photo::whereId($this->phone_id)->get()),
            'information' => $this->information,
            'address' => $this->address,
            'salary' => $this->salary
        ];
    }
}
