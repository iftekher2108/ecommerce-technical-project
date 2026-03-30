<?php

namespace Shop\Sales\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;



    public function orderItems() {
        return $this->hasMany(OrderItem::class,'order_id','id');
    }

}
