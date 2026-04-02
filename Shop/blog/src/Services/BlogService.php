<?php

namespace Shop\Blog\Services;

use Shop\Blog\Models\Blog;

class BlogService {
    public function blogAll() {
        $blogs = Blog::with('category')->paginate(10);
        return ['blogs' => $blogs];
    }
}

