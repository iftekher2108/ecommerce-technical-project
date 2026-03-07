<?php

namespace Shop\Catelog\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Shop\Catelog\Services\BrandService;
use Shop\Catelog\Services\CategoryService;
use Shop\Catelog\Services\ProductService;

class ProductController extends Controller
{
    public function __construct(protected ProductService $productService, protected BrandService $brandService, protected CategoryService $categoryService) {}
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
        return view('catelog::product.create', [
            'brands' => $brands,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:products,name',
            'sku'  => 'required|max:255|unique:products,sku',

            'picture' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'banner'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'images'  => 'nullable|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:4096',

            'short_description' => 'nullable',
            'description'       => 'nullable',

            // SEO
            'meta_title'       => 'nullable|max:255',
            'meta_description' => 'nullable',
            'meta_keywords'    => 'nullable|max:255',

            'brand_id' => 'nullable|exists:brands,id',
            'category' => 'nullable|array',

            // 'product_attr_group_id' => 'nullable|exists:product_attr_groups,id',

            'price'      => 'required|numeric|min:0|gt:cost_price',
            'sale_price' => 'nullable|numeric|min:0|lte:price',
            'cost_price' => 'nullable|numeric|min:0',

            'in_stock' => 'boolean',
            'stock'    => 'required|integer|min:0',

            'order_id'    => 'nullable|integer|min:0',
            'is_featured' => 'boolean',
            'status'      => 'boolean',
        ]);
        $this->productService->productStore($request);
        return to_route($this->productService->redirect)->with('success', 'Product Create Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function status($id)
    {
        $this->productService->productStatus($id);
        return to_route($this->productService->redirect)->with('success', 'Product Status Change Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brands = $this->brandService->getBrands();
        $categories = $this->categoryService->getCategories();
        $product = $this->productService->productById($id);
        return view('catelog::product.edit', [
            'brands' => $brands,
            'categories' => $categories,
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255|unique:products,name,'. $id .',id',
            'sku'  => 'required|max:255|unique:products,sku,'. $id .',id',

            'picture' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'banner'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'images'  => 'nullable|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:4096',

            'short_description' => 'nullable',
            'description'       => 'nullable',

            // SEO
            'meta_title'       => 'nullable|max:255',
            'meta_description' => 'nullable',
            'meta_keywords'    => 'nullable|max:255',

            'brand_id' => 'nullable|exists:brands,id',
            'category' => 'nullable|array',

            // 'product_attr_group_id' => 'nullable|exists:product_attr_groups,id',

            'price'      => 'required|numeric|min:0|gt:cost_price',
            'sale_price' => 'nullable|numeric|min:0|lte:price',
            'cost_price' => 'nullable|numeric|min:0',

            'in_stock' => 'boolean',
            'stock'    => 'required|integer|min:0',

            'order_id'    => 'nullable|integer|min:0',
            'is_featured' => 'boolean',
            'status'      => 'boolean',
        ]);
        $this->productService->productUpdate($request, $id);
        return to_route($this->productService->redirect)->with('success', 'Product Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->productService->productDelete($id);
        return to_route($this->productService->redirect)->with('success', 'Product Delete Successfully');
    }

    public function editorUpload(Request $request) {
        $data = $this->productService->editorUpload($request);
        return response()->json($data);
    }

}
