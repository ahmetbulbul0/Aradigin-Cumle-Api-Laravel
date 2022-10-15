<?php

namespace App\Models;

use App\Models\News;
use App\Models\ResourceUrls;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResourcePlatforms extends Model
{
    use HasFactory;

    protected $primaryKey = "no";

    public function resourceUrls() {
        return $this->belongsTo(ResourceUrls::class, "platform", "no");
    }

    public function news() {
        return $this->belongsTo(News::class, "resource_platform", "no");
    }
}
