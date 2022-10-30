<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceUrls extends Model
{
    protected $fillable = [
        "no",
        "url",
        "platform"
    ];

    use HasFactory;

    public function platformData() {
        return $this->hasOne(ResourcePlatforms::class, "no", "platform");
    }

    public function news() {
        return $this->hasMany(News::class, "resource_url", "no")->with("authorData", "categoryData", "resourcePlatformData", "approvedByData", "rejectedByData");
    }
}
