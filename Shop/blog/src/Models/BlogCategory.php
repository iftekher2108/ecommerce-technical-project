<?php

namespace Shop\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $guarded = [];

    public function blogs() {
        return $this->hasMany(Blog::class, 'blog_id', 'id');
    }

}
