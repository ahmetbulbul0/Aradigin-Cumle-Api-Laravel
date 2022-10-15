<?php

namespace App\Models;

use App\Models\Users;
use App\Models\UserTypePermissions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserTypes extends Model
{
    use HasFactory;

    protected $primaryKey = "id";

    public function users() {
        return $this->belongsTo(Users::class, "type", "no");
    }

    public function permissions() {
        return $this->hasMany(UserTypePermissions::class, "user_type_no", "no");
    }
}
