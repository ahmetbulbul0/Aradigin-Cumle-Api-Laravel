<?php

namespace App\Http\Resources\ResourceDatas;

class PublicUsersResourceData
{
    static function get($thisData)
    {
        $data = [
            "username" => $thisData->username,
            "fullName" => $thisData->full_name
        ];

        return $data;
    }
}
