<?php

namespace App\Http\Resources\ResourceDatas;

class UserTypesPermissionsResourceData
{
    static function get($thisData)
    {
        $data = [
            "no" => $thisData->no,
            "createCategory" => $thisData->create_category,
            "editCategory" => $thisData->edit_category,
            "deleteCategory" => $thisData->delete_category,
            "want_newCategory" => $thisData->want_new_category,
            "createResourcePlatform" => $thisData->create_resource_platform,
            "editResourcePlatform" => $thisData->edit_resource_platform,
            "deleteResourcePlatform" => $thisData->delete_resource_platform,
            "wantNewResourcePlatform" => $thisData->want_new_resource_platform,
            "createNews" => $thisData->create_news,
            "editNews" => $thisData->edit_news,
            "deleteNews" => $thisData->delete_news,
            "changeNewsStatus" => $thisData->change_news_status,
            "banAUser" => $thisData->ban_a_user,
            "wantUserBanned" => $thisData->want_user_banned,
            "restoreDeleted" => $thisData->restore_deleted,
            "editTypePermissions" => $thisData->edit_type_permissions,
            "editUserPermissions" => $thisData->edit_user_permissions,
            "other" => $thisData->other,
        ];

        return $data;
    }
}
