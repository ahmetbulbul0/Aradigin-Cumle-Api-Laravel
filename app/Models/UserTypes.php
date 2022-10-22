<?php

namespace App\Models;

use App\Models\Users;
use App\Models\UserTypePermissions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserTypes extends Model
{
    use HasFactory;

    public function users() {
        return $this->hasMany(Users::class, "type", "no")->with("permissionsData", "settingsData");
    }

    public function permissionsData() {
        return $this->hasOne(UserTypePermissions::class, "user_type_no", "no");
    }
}
