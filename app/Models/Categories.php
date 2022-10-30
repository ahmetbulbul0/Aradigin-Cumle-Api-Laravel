<?php

namespace App\Models;

use App\Models\News;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categories extends Model
{
    protected $fillable = [
        "no",
        "name",
        "slug",
        "is_parent",
        "is_children",
        "parent_category"
    ];

    use HasFactory;

    public function parentCategoryData() {
        return $this->hasOne(Categories::class, "no", "parent_category")->with("parentCategoryData");
    }

    public function childrenCategories() {
        return $this->hasMany(Categories::class, "parent_category", "no")->with("childrenCategories");
    }

    public function news() {
        return $this->hasMany(News::class, "category", "no")->with("authorData", "resourcePlatformData", "resourceUrlData", "approvedByData", "rejectedByData");
    }
}
