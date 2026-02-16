<?php

namespace Shop\Catelog\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $guarded = [];

    protected $casts = [
        'images' => 'array',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class)
            ->withTimestamps();
    }

    public function brand() {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
}
