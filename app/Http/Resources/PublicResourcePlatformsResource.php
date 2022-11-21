<?php

namespace App\Http\Resources;

use App\Http\Resources\ResourceDatas\PublicResourcePlatformsResourceData;
use Illuminate\Http\Resources\Json\JsonResource;

class PublicResourcePlatformsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = PublicResourcePlatformsResourceData::get($this);
        return $data;
    }
}
