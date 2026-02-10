<?php

namespace Shop\Catelog\Services;

use Shop\Catelog\Models\Category;

class CategoryService
{

    public $redirect = 'admin.category.index';
    public function categoryAll($request)
    {
        $query = Category::query();
        $search = $request->input('search');
        if ($search) {
            $query->where('name', 'like', "%$search%");
        }
        $categories = $query->paginate(15);
        return ['categories' => $categories, 'search' => $search];
    }
}
