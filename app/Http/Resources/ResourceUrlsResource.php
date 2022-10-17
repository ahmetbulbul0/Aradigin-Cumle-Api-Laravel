<?php

namespace App\Http\Resources;

use App\Http\Resources\NewsResource;
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
        return [
            "no" => $this->no,
            "url" => $this->url,
            "platform" => $this->platformData ? new ResourcePlatformsResource($this->whenLoaded("platformData")) : $this->platform,
            "news" => NewsResource::collection($this->whenLoaded("news")),
        ];
    }
}
