<?php

namespace App\Http\Resources;

use App\Http\Resources\ResourceDatas\UserSettingsResourceData;
use Illuminate\Http\Resources\Json\JsonResource;

class UserSettingsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = UserSettingsResourceData::get($this);

        $data["user"] = new UsersResource($this->whenLoaded("userData"));

        return $data;
    }
}
