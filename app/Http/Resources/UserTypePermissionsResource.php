<?php

namespace App\Http\Resources;

use App\Http\Resources\ResourceDatas\UserTypesPermissionsResourceData;
use Illuminate\Http\Resources\Json\JsonResource;

class UserTypePermissionsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = UserTypesPermissionsResourceData::get($this);

        return $data;
    }
}
