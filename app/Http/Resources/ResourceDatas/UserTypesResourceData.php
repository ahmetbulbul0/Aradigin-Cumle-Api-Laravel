<?php

namespace App\Http\Resources\ResourceDatas;

class UserTypesResourceData
{
    static function get($thisData)
    {
        $data = [
            "no" => $thisData->no,
            "name" => $thisData->name,
            "slug" => $thisData->slug,
        ];

        return $data;
    }
}
