<?php

namespace App\Http\Resources\ResourceDatas;

class ResourceUrlsResourceData
{
    static function get($thisData)
    {
        $data = [
            "no" => $thisData->no,
            "url" => $thisData->url,
        ];

        return $data;
    }
}
