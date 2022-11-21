<?php

namespace App\Http\Resources\ResourceDatas;

class PublicResourcePlatformsResourceData
{
    static function get($thisData)
    {
        $data = [
            "name" => $thisData->name,
            "mainUrl" => $thisData->main_url,
            "slug" => $thisData->slug,
        ];

        return $data;
    }
}
