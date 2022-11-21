<?php

namespace App\Http\Resources\ResourceDatas;

class PublicResourceUrlsResourceData
{
    static function get($thisData)
    {
        $data = [
            "url" => $thisData->url,
        ];

        return $data;
    }
}
