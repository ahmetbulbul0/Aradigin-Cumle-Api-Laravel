<?php

namespace App\Http\Resources\ResourceDatas;

class CategoriesResourceData
{
    static function get($thisData)
    {
        $data = [
            "no" => $thisData->no,
            "name" => $thisData->name,
            "slug" => $thisData->slug,
            "isParent" => $thisData->is_parent,
            "isChildren" => $thisData->is_children,
        ];

        return $data;
    }
}
