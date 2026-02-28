<?php

namespace Shop\Store\Services;

use Shop\Appearance\Models\Slider;
use Shop\Catelog\Models\Brand;
use Shop\Catelog\Models\Category;
use Shop\Catelog\Models\Product;

class StoreService
{
    public function index()
    {
        $sliders = Slider::where('status', 1)->orderBy('order_id', 'asc')->get();
        $categories = Category::where('status', 1)->orderBy('order_id', 'asc')->with('children')->get();
        $brands = Brand::where('status', 1)->orderBy('order_id')->get();
        $featuredProducts = Product::where('status', 1)->orderBy('order_id')->where('is_featured', 1)->get();
        $discountProducts = Product::where('status',1)->orderBy('order_id')->whereNotNull('sale_price')->get();

        return [
            'sliders' => $sliders,
            'categories' => $categories,
            'brands' => $brands,
            'featuredProducts' => $featuredProducts,
            'discountProducts' => $discountProducts
        ];
    }
}
