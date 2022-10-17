<?php

namespace App\Http\Resources\ResourceDatas;

class ResourcePlatformsResourceData
{
    static function get($thisData)
    {
        $data = [
            "no" => $thisData->no,
            "name" => $thisData->name,
            "mainUrl" => $thisData->main_url,
            "slug" => $thisData->slug,
        ];

        return $data;
    }
}
