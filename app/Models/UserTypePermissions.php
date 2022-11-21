<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTypePermissions extends Model
{
    protected $fillable = [
        "no",
        "user_type_no",
        "create_category",
        "edit_category",
        "delete_category",
        "want_new_category",
        "create_resource_platform",
        "edit_resource_platform",
        "delete_resource_platform",
        "want_new_resource_platform",
        "create_news",
        "edit_news",
        "delete_news",
        "change_news_status",
        "ban_a_user",
        "want_user_banned",
        "restore_deleted",
        "edit_type_permissions",
        "edit_user_permissions",
        "other"
    ];

    protected $hidden = [
        "id",
        "no",
        "user_type_no",
        "is_deleted",
        "deleted_at",
        "created_at",
        "updated_at"
    ];

    use HasFactory;

    public function userTypeData() {
        return $this->hasOne(UserTypes::class, "no", "user_type_no");
    }
}
