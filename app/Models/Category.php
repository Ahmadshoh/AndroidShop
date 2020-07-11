<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = ['title', 'alias', 'parent_id', 'created_at', 'updated_at'];

    public function setAliasAttribute($value) {
        $this->attributes['alias'] = Str::slug($this->title);
    }

    public function children() {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function getProducts() {
        return $this->hasMany(Product::class, 'category_id');
    }
}
