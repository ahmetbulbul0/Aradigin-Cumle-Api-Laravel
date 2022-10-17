<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserTypePermissionsResource;

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
        return [
            "no" => $this->no,
            "name" => $this->name,
            "slug" => $this->slug,
            "permissions" => $this->permissionsData ? new UserTypePermissionsResource($this->whenLoaded("permissionsData")) : $this->permissions
        ];
    }
}
