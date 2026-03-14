<?php

namespace Shop\Store\Http\Controllers;

use App\Http\Controllers\Controller;
use Shop\Store\Services\StoreService;
use Symfony\Component\HttpFoundation\Request;

class StoreController extends Controller
{
    public function __construct(protected StoreService $storeService)
    {
    }
    public function index() {
        $data = $this->storeService->index();
        return view('store::index', $data);
    }

    public function shop(Request $request) {
        return view('store::shop.index');
    }

    public function productDetail($slug) {
        $product = $this->storeService->productDetail($slug);
        return view('store::product.detail',['product' => $product]);
    }

}
