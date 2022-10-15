<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    public function parentCategory() {
        return $this->hasOne(Categories::class, "no", "parent_category")->with("parentCategory");
    }

    public function childrenCategories() {
        return $this->hasMany(Categories::class, "parent_category", "no")->with("childrenCategories");
    }
}
