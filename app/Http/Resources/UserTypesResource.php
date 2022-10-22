<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ResourceDatas\UserTypesResourceData;
use App\Http\Resources\UserTypesUserTypePermissionsResource;

class UserTypesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = UserTypesResourceData::get($this);

        $data["permissions"] = new UserTypesUserTypePermissionsResource($this->whenLoaded("permissionsData"));
        $data["users"] = UsersResource::collection($this->whenLoaded("users"));

        return $data;
    }
}
