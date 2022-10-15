<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTypePermissions extends Model
{
    use HasFactory;

    protected $primaryKey = "no";

    public function userType() {
        return $this->hasOne(UserTypes::class, "no", "user_type");
    }
}
