<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
        return [
            "no" => $this->no,
            "name" => $this->name,
            "slug" => $this->slug,
            "isParent" => $this->is_parent,
            "isChildren" => $this->is_children,
            "parentCategory" => $this->parent_category
        ];
    }
}
