<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
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
            "username" => $this->username,
            "fullName" => $this->full_name,
            "password" => $this->password,
            "type" => $this->type,
            "settings" => $this->settings,
            "permissions" => $this->permissions
        ];
    }
}
