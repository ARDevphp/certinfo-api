<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeacherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'people_id' => $this->people_id,
            'phone' => $this->phone,
            'information' => $this->information,
            'address' => $this->address,
            'salary' => $this->salary
        ];
    }
}
