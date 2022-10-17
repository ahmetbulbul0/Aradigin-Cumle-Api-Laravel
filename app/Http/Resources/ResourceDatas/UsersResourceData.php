<?php

namespace App\Http\Resources\ResourceDatas;

class UsersResourceData
{
    static function get($thisData)
    {
        $data = [
            "no" => $thisData->no,
            "username" => $thisData->username,
            "fullName" => $thisData->full_name,
            "password" => $thisData->password,
        ];

        return $data;
    }
}
