<?php

namespace Shop\Catelog\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $guarded = [];


    public function products() {
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }

}
