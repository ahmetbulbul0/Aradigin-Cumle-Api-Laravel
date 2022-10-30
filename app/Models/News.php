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
    protected $fillable = [
        "no",
        "title",
        "content",
        "author",
        "category",
        "resource_platform",
        "resource_url",
        "added_time",
        "publish_status",
        "publish_date",
        "status",
        "slug",
        "is_approved",
        "approved_at",
        "approved_by",
        "is_rejected",
        "rejected_at",
        "rejected_by",
        "rejected_reason"
    ];

    use HasFactory;

    public function authorData() {
        return $this->hasOne(Users::class, "no", "author")->with("typeData", "permissionsData", "settingsData");
    }

    public function categoryData() {
        return $this->hasOne(Categories::class, "no", "category")->with("parentCategoryData", "childrenCategories");
    }

    public function resourcePlatformData() {
        return $this->hasOne(ResourcePlatforms::class, "no", "resource_platform");
    }

    public function resourceUrlData() {
        return $this->hasOne(ResourceUrls::class, "no", "resource_url");
    }

    public function approvedByData() {
        return $this->hasOne(Users::class, "no", "approved_by")->with("typeData", "permissionsData", "settingsData");
    }

    public function rejectedByData() {
        return $this->hasOne(Users::class, "no", "rejected_by")->with("typeData", "permissionsData", "settingsData");
    }
}
