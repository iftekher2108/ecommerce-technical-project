<?php

namespace Shop\Catelog\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Shop\Catelog\Services\CategoryService;

class CategoryController extends Controller
{
    public function __construct(protected CategoryService $categoryService) {}
    public function index(Request $request)
    {
        $data = $this->categoryService->categoryAll($request);
        return view('catelog::category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = $this->categoryService->getCategories();
        return view('catelog::category.create', ['categories' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'nullable',
            'banner' => 'nullable',
            'picture' => 'nullable',
            'category' => 'nullable',
            'name' => 'required',
            'description' => 'nullable',
            'order_id' => 'nullable',
            'meta_title' => 'nullable',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
            'status' => 'required',
        ]);
        $this->categoryService->categoryStore($request);
        return to_route($this->categoryService->redirect)->with('success', 'Category Create Successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = $this->categoryService->getCategories();
        $category = $this->categoryService->categoryById($id);
        return view('catelog::category.edit', [
            'categories' => $categories,
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'icon' => 'nullable',
            'banner' => 'nullable',
            'picture' => 'nullable',
            'category' => 'nullable',
            'name' => 'required',
            'description' => 'nullable',
            'order_id' => 'nullable',
            'meta_title' => 'nullable',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
            'status' => 'required',
        ]);
        $this->categoryService->categoryUpdate($request, $id);
        return to_route($this->categoryService->redirect)->with('success', 'Category Update Successfully');
    }

    public function status($id) {
        $this->categoryService->categoryStatus($id);
        return to_route($this->categoryService->redirect)->with('success', 'Category Status Change Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->categoryService->categoryDelete($id);
        return to_route($this->categoryService->redirect)->with('success', 'Category Delete Successfully');
    }
}
