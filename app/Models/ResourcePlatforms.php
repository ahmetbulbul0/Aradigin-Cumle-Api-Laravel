<?php

namespace App\Models;

use App\Models\News;
use App\Models\ResourceUrls;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResourcePlatforms extends Model
{
    use HasFactory;

    public function resourceUrls() {
        return $this->hasMany(ResourceUrls::class, "platform", "no");
    }

    public function news() {
        return $this->hasMany(News::class, "resource_platform", "no")->with("authorData", "categoryData", "resourceUrlData", "approvedByData", "rejectedByData");
    }
}
