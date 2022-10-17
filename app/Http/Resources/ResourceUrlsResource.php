<?php

namespace App\Http\Resources;

use App\Http\Resources\NewsResource;
use App\Http\Resources\ResourceDatas\ResourceUrlsResourceData;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ResourcePlatformsResource;

class ResourceUrlsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = ResourceUrlsResourceData::get($this);

        $data["platform"] = new ResourcePlatformsResource($this->whenLoaded("platformData"));
        $data["news"] = NewsResource::collection($this->whenLoaded("news"));

        return $data;
    }
}
