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
        "is_banned"
    ];

    use HasFactory;

    public function userData() {
        return $this->hasOne(Users::class, "no", "user_no")->with("typeData", "settingsData");
    }
}
