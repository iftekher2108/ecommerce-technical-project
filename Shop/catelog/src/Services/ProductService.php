<?php

namespace Shop\Catelog\Services;

use Shop\Catelog\Models\Product;

class ProductService
{
    public $redirect = 'admin.product.index';

    public function productAll($request)
    {
        $query = Product::query();
        $search = $request->input('search');
        if ($search) {
            $query->where('name', 'like', "%$search%");
        }
        $products = $query->paginate(15);
        return ['products' => $products, 'search' => $search];
    }
}
