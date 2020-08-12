<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed order_id
 * @property mixed product_id
 * @property mixed qty
 * @property mixed total_price
 */
class OrderProduct extends Model
{
    public function getProduct() {
        return $this->hasOne(Product::class, 'id', 'product_id')->first();
    }
}
