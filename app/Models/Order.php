<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed status
 */
class Order extends Model
{
    protected $fillable = ['user_id', 'status', 'buying_type', 'address', 'comment', 'qty', 'totalPrice'];

    public function getItems() {
        return $this->hasMany(OrderProduct::class)->get();
    }

    public function getUser() {
        return $this->hasOne(User::class, 'id', 'user_id')->first();
    }
}
