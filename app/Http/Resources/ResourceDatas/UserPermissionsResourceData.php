<?php

namespace App\Http\Resources\ResourceDatas;

class UserPermissionsResourceData
{
    static function get($thisData)
    {
        $data = [
            "no" => $thisData->no,
            "isBanned" => $thisData->is_banned,
            "changeVisibility" => $thisData->change_visibility,
            "changeProfile_photo" => $thisData->change_profile_photo,
            "changeWebsiteTheme" => $thisData->change_website_theme,
            "changeDashboardTheme" => $thisData->change_dashboard_theme,
            "other" => $thisData->other
        ];

        return $data;
    }
}
