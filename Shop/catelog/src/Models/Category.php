<?php

namespace Shop\Catelog\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withTimestamps();
    }

    public function parent() {
        return $this->belongsTo(Category::class,'parent_id','id');
    }

    public function children() {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
    
}
