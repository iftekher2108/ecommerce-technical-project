<?php

namespace Shop\Catelog\Http\Controllers;

use Illuminate\Http\Request;
use Shop\Catelog\Models\Brand;
use Shop\Catelog\Services\BrandService;

class BrandController
{
    public function __construct(protected BrandService $brandService) {}
    public function index(Request $request)
    {
        $data = $this->brandService->brandAll($request);
        return view('catelog::brand.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('catelog::brand.create');
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
            'name' => 'required',
            'description' => 'nullable',
            'order_id' => 'nullable',
            'meta_title' => 'nullable',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
            'status' => 'required',
        ]);
        $this->brandService->brandStore($request);
        return to_route($this->brandService->redirect)->with('success', 'Brand Create Successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = $this->brandService->brandById($id);
        return view('catelog::brand.edit', ['brand' => $data]);
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
            'name' => 'required',
            'description' => 'nullable',
            'order_id' => 'nullable',
            'meta_title' => 'nullable',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
            'status' => 'required',
        ]);
        $this->brandService->brandUpdate($request, $id);
        return to_route($this->brandService->redirect)->with('success', 'Brand Update Successfully');
    }

    public function status($id) {
        $this->brandService->brandStatus($id);
        return to_route($this->brandService->redirect)->with('success', 'Brand Status Change Successfully');
    }

    public function destroy($id)
    {
        $this->brandService->brandDelete($id);
        return to_route($this->brandService->redirect)->with('success', 'Brand Delete Successfully');
    }
}
