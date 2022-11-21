<?php

namespace App\Http\Resources\ResourceDatas;

class PublicNewsResourceData
{
    static function get($thisData)
    {
        $data = [
            "title" => $thisData->title,
            "content" => $thisData->content,
            "publishDate" => $thisData->publish_date,
            "slug" => $thisData->slug,
        ];

        return $data;
    }
}
