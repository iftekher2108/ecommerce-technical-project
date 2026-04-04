<?php

namespace Shop\Blog\Services;

use Shop\Blog\Models\Blog;

class BlogService {
    public $redirect = '';
    public function blogAll() {
        $blogs = Blog::with('category')->paginate(10);
        return ['blogs' => $blogs];
    }

    public function blogById($id) {
        $blog = Blog::with('category')->find($id);
        return $blog;
    }

    public function blogStore($request) {

    }

    public function blogUpdate($request, $id) {

    }

    public function blogDelete($id) {

    }

}

