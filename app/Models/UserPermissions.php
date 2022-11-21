<?php

namespace App\Models;

use App\Models\Users;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserPermissions extends Model
{
    protected $fillable = [
        "no",
        "user_no",
        "is_banned",
        "change_visibility",
        "change_profile_photo",
        "change_website_theme",
        "change_dashboard_theme",
        "other"
    ];

    protected $hidden = [
        "id",
        "no",
        "user_no",
        "is_deleted",
        "deleted_at",
        "created_at",
        "updated_at"
    ];

    use HasFactory;

    public function userData() {
        return $this->hasOne(Users::class, "no", "user_no")->with("typeData", "settingsData");
    }
}
