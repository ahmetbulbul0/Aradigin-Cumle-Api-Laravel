<?php

namespace App\Http\Resources;

use App\Http\Resources\ResourceDatas\UserPermissionsResourceData;
use App\Http\Resources\UsersResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserPermissionsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = UserPermissionsResourceData::get($this);

        return $data;
    }
}
