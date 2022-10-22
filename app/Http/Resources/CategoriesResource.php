<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ResourceDatas\CategoriesResourceData;

class CategoriesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = CategoriesResourceData::get($this);

        $data["parentCategory"] = new CategoriesResource($this->whenLoaded("parentCategoryData"));
        $data["childrenCategories"] = CategoriesResource::collection($this->whenLoaded("childrenCategories"));
        $data["news"] = NewsResource::collection($this->whenLoaded("news"));

        return $data;
    }
}
