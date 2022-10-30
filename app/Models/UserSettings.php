<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSettings extends Model
{
    protected $fillable = [
        "no",
        "user_no",
        "is_public",
        "profile_photo",
        "website_theme",
        "dashboard_theme"
    ];

    use HasFactory;

    public function userData() {
        return $this->hasOne(Users::class, "no", "user_no")->with("typeData", "permissionsData");
    }
}
