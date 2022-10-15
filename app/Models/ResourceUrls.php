<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceUrls extends Model
{
    use HasFactory;

    protected $primaryKey = "no";

    public function platform() {
        return $this->hasOne(ResourcePlatforms::class, "no", "platform");
    }

    public function news() {
        return $this->belongsTo(News::class, "resource_url", "no");
    }
}
