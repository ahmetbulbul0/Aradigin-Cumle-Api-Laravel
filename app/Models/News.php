<?php

namespace App\Models;

use App\Models\Users;
use App\Models\Categories;
use App\Models\ResourceUrls;
use App\Models\ResourcePlatforms;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;

    protected $primaryKey = "no";

    public function author() {
        return $this->hasOne(Users::class, "no", "author")->with("type", "permissions", "settings");
    }

    public function category() {
        return $this->hasOne(Categories::class, "no", "category")->with("parentCategory");
    }

    public function resourcePlatform() {
        return $this->hasOne(ResourcePlatforms::class, "no", "resource_platform");
    }

    public function resourceUrl() {
        return $this->hasOne(ResourceUrls::class, "no", "resource_url")->with("platform");
    }

    public function approvedBy() {
        return $this->hasOne(Users::class, "no", "approved_by")->with("type", "permissions", "settings");
    }

    public function rejectedBy() {
        return $this->hasOne(Users::class, "no", "rejected_by")->with("type", "permissions", "settings");
    }
}
