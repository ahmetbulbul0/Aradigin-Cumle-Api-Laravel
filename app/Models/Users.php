<?php

namespace App\Models;

use App\Models\UserTypes;
use App\Models\UserSettings;
use App\Models\UserPermissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Users extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = [
        "no",
        "username",
        "full_name",
        "password",
        "type",
        "settings",
        "permissions"
    ];

    protected $hidden = [
        "id",
        "is_deleted",
        "deleted_at",
        "created_at",
        "updated_at"
    ];

    public function typeData() {
        return $this->hasOne(UserTypes::class, "no", "type")->with("permissionsData");
    }

    public function permissionsData() {
    return $this->hasOne(UserPermissions::class, "user_no", "no");
    }

    public function settingsData() {
        return $this->hasOne(UserSettings::class, "user_no", "no");
    }

    public function news() {
        return $this->hasMany(News::class, "author", "no")->with("categoryData", "resourcePlatformData", "resourceUrlData", "approvedByData", "rejectedByData");
    }
}
