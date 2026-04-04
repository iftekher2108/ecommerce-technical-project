<?php

namespace Shop\Blog\Services;

use Shop\Blog\Models\BlogCategory;

class BlogCatService {
    public $redirect = '';

    public function categoryAll($request) {

    }

    public function categoryById($id) {
        $category = BlogCategory::findOrFail($id);
        return $category;
    }

    public function categoryStore($request) {

    }

    public function categoryUpdate($request, $id) {

    }

    public function categoryDelete($id) {

    }

}
