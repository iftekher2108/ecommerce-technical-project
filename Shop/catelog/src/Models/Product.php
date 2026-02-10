<?php

namespace Shop\Catelog\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(Category::class)
            ->withTimestamps();
    }
}
