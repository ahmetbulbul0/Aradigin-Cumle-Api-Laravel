<?php

namespace App\Http\Resources;

use App\Http\Resources\ResourceDatas\PublicUsersResourceData;
use Illuminate\Http\Resources\Json\JsonResource;

class PublicUsersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = PublicUsersResourceData::get($this);
        return $data;
    }
}
