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
        $featuredProducts = Product::where('status', 1)->orderBy('order_id')->where('is_featured', 1)->paginate(12);
        $discountProducts = Product::where('status',1)->orderBy('order_id')->whereNotNull('sale_price')->paginate(12);
        $latestProducts = Product::where('status',1)->latest()->take(8)->paginate(12);
        $products = Product::where('status',1)->orderBy('order_id')->paginate(12);
        return [
            'sliders' => $sliders,
            'categories' => $categories,
            'brands' => $brands,
            'featuredProducts' => $featuredProducts,
            'discountProducts' => $discountProducts,
            'products' => $products,
            'latestProducts' => $latestProducts
        ];
    }

    public function productDetail($slug) {
        $product = Product::where('slug',$slug)->with(['categories','brand'])->first();
        return $product;
    }


    public function shop($request) {
        $categories = Category::where('status', 1)->orderBy('order_id', 'asc')->get();
        $brands = Brand::where('status', 1)->orderBy('order_id')->get();
        $products = Product::where('status',1)->orderBy('order_id')->paginate(12);
        return [
            'categories' => $categories,
            'brands' => $brands,
            'products' => $products
        ];
    }


}
