<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ResourceDatas\CategoriesResourceData;

class NewsCategoriesResource extends JsonResource
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

        $data["parentCategory"] = new NewsCategoriesResource($this->whenLoaded("parentCategoryData"));
        $data["childrenCategories"] = NewsCategoriesResource::collection($this->whenLoaded("childrenCategories"));

        return $data;
    }
}
