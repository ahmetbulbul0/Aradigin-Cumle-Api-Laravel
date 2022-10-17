<?php

namespace App\Http\Resources;

use App\Http\Resources\NewsResource;
use App\Http\Resources\ResourceDatas\ResourcePlatformsResourceData;
use App\Http\Resources\ResourceUrlsResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ResourcePlatformsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = ResourcePlatformsResourceData::get($this);

        $data["resourceUrls"] = ResourceUrlsResource::collection($this->whenLoaded("resourceUrls"));
        $data["news"] = NewsResource::collection($this->whenLoaded("news"));

        return $data;
    }
}
