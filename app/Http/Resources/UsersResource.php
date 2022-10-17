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
            "type" => $this->typeData ? new UserTypesResource($this->whenLoaded("typeData")) : $this->type,
            "settings" => $this->settingsData ? new UserSettingsResource($this->whenLoaded("settingsData")) : $this->settings,
            "news" => NewsResource::collection($this->whenLoaded("news"))
        ];
    }
}
