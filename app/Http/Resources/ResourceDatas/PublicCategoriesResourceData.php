<?php

namespace App\Http\Resources\ResourceDatas;

class PublicCategoriesResourceData
{
    static function get($thisData)
    {
        $data = [
            "name" => $thisData->name,
            "slug" => $thisData->slug,
        ];

        return $data;
    }
}
