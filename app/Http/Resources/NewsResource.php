<?php

namespace App\Http\Resources;

use App\Http\Resources\UsersResource;
use App\Http\Resources\ResourceUrlsResource;
use App\Http\Resources\NewsCategoriesResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ResourcePlatformsResource;
use App\Http\Resources\ResourceDatas\NewsResourceData;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = NewsResourceData::get($this);

        $data["author"] = new UsersResource($this->whenLoaded("authorData"));
        $data["category"] = new NewsCategoriesResource($this->whenLoaded("categoryData"));
        $data["resourcePlatform"] = new ResourcePlatformsResource($this->whenLoaded("resourcePlatformData"));
        $data["resourceUrl"] = new ResourceUrlsResource($this->whenLoaded("resourceUrlData"));
        $data["approvedBy"] = new UsersResource($this->whenLoaded("approvedByData"));
        $data["rejectedBy"] = new UsersResource($this->whenLoaded("rejectedByData"));

        return $data;
    }
}
