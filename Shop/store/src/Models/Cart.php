<?php

namespace Shop\Store\Models;

use Illuminate\Database\Eloquent\Model;
use Shop\Catelog\Models\Product;

class Cart extends Model
{
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
