<?php

namespace App\Http\Resources;

use App\Http\Resources\ResourceDatas\PublicResourceUrlsResourceData;
use Illuminate\Http\Resources\Json\JsonResource;

class PublicResourceUrlsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = PublicResourceUrlsResourceData::get($this);
        return $data;
    }
}
