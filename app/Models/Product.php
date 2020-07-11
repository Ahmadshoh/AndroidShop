<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @property mixed title
 * @property mixed alias
 * @property mixed alif_link
 * @property mixed price
 * @property mixed amount
 * @property mixed description
 * @property mixed image
 * @property mixed visible
 * @property mixed recommended
 */
class Product extends Model
{
    protected $fillable = ['category_id', 'title', 'alias', 'alif_link', 'price', 'amount', 'description', 'image', 'visible', 'recommended', 'created_at', 'updated_at'];

    public function setAliasAttribute($value) {
        $this->attributes['alias'] = Str::slug($this->title);
    }

    public function category() {
        return $this->belongsTo(Category::class)->first();
    }

    public function parentCategory($child_category) {
        return Category::where('id', $child_category->parent_id)->first();
    }
}
