<?php

namespace App\Http\Resources\ResourceDatas;

class UserSettingsResourceData
{
    static function get($thisData)
    {
        $data = [
            "no" => $thisData->no,
            "isPublic" => $thisData->is_public,
            "profilePhoto" => $thisData->profile_photo,
            "websiteTheme" => $thisData->website_theme,
            "dashboardTheme" => $thisData->dashboard_theme
        ];

        return $data;
    }
}
