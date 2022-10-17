<?php

namespace App\Http\Resources;

use App\Http\Resources\ResourceDatas\UsersResourceData;
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
        $data = UsersResourceData::get($this);

        $data["type"] = new UserTypesResource($this->whenLoaded("typeData"));
        $data["settings"] = new UserSettingsResource($this->whenLoaded("settingsData"));
        $data["news"] = NewsResource::collection($this->whenLoaded("news"));

        return $data;
    }
}
