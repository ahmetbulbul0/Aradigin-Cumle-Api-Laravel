<?php

namespace App\Http\Resources\ResourceDatas;

class UserPermissionsResourceData
{
    static function get($thisData)
    {
        $data = [
            "no" => $thisData->no,
            "isBanned" => $thisData->is_banned
        ];

        return $data;
    }
}
