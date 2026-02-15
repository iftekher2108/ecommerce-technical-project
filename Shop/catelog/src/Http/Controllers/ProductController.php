<?php

namespace Shop\Catelog\Http\Controllers;

use Illuminate\Http\Request;
use Shop\Catelog\Models\Product;
use Shop\Catelog\Services\BrandService;
use Shop\Catelog\Services\CategoryService;
use Shop\Catelog\Services\ProductService;

class ProductController
{
    public function __construct(protected ProductService $productService, protected BrandService $brandService, protected CategoryService $categoryService)
    {
    }
    public function index(Request $request)
    {
        $data = $this->productService->productAll($request);
        return view('catelog::product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = $this->brandService->getBrands();
        $categories = $this->categoryService->getCategories();
        return view('catelog::product.create',[
            'brands' => $brands,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
