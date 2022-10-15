<?php

namespace App\Models;

use App\Models\UserTypes;
use App\Models\UserSettings;
use App\Models\UserPermissions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Users extends Model
{
    use HasFactory;

    public function type() {
        return $this->hasOne(UserTypes::class, "no", "type");
    }

    public function permissions() {
        return $this->hasOne(UserPermissions::class, "user_no", "no");
    }

    public function settings() {
        return $this->hasOne(UserSettings::class, "user_no", "no");
    }

    public function news() {
        return $this->belongsTo(News::class, "author", "no");
    }
}
