<?php

namespace App\Http\Resources\ResourceDatas;

use App\Http\Tools\PublishDateGenerator;

class PublicNewsResourceData
{
    static function get($thisData)
    {
        $data = [
            "title" => $thisData->title,
            "content" => $thisData->content,
            "publishDate" => PublishDateGenerator::single($thisData->publish_date),
            "slug" => $thisData->slug,
        ];

        return $data;
    }
}
