<?php

namespace App\Http\Resources;

use App\Http\Resources\PublicUsersResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PublicResourceUrlsResource;
use App\Http\Resources\PublicResourcePlatformsResource;
use App\Http\Resources\ResourceDatas\PublicNewsResourceData;

class PublicNewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = PublicNewsResourceData::get($this);

        $data["author"] = new PublicUsersResource($this->whenLoaded("authorData"));
        $data["category"] = new PublicNewsCategoriesResource($this->whenLoaded("categoryData"));
        $data["resourcePlatform"] = new PublicResourcePlatformsResource($this->whenLoaded("resourcePlatformData"));
        $data["resourceUrl"] = new PublicResourceUrlsResource($this->whenLoaded("resourceUrlData"));

        return $data;
    }
}
