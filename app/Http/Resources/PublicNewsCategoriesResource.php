<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ResourceDatas\PublicCategoriesResourceData;

class PublicNewsCategoriesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = PublicCategoriesResourceData::get($this);

        $data["parentCategory"] = new PublicNewsCategoriesResource($this->whenLoaded("parentCategoryData"));
        $data["childrenCategories"] = PublicNewsCategoriesResource::collection($this->whenLoaded("childrenCategories"));

        return $data;
    }
}
