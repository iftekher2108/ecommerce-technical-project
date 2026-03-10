<?php

namespace Shop\Appearance\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Shop\Appearance\Services\SliderService;

class SliderController extends Controller
{
    public function __construct(protected SliderService $sliderService) {}
    public function index(Request $request)
    {
        $data = $this->sliderService->index($request);
        return view('appearance::slider.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('appearance::slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'nullable|integer',
            'picture' => 'required|image',
            'title' => 'nullable|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'action' => 'nullable|string|max:255',
            'status' => 'required|boolean',
        ]);
        $this->sliderService->sliderStore($request);
        return redirect()->route($this->sliderService->redirect)->with('success', 'Slider create successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = $this->sliderService->sliderById($id);
        return view('appearance::slider.edit',['slider' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'order_id' => 'nullable|integer',
            'picture' => 'nullable|image',
            'title' => 'nullable|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'action' => 'nullable|string|max:255',
            'status' => 'required|boolean',
        ]);
        $this->sliderService->sliderUpdate($request, $id);
        return redirect()->route($this->sliderService->redirect)->with('success', 'Slider update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->sliderService->sliderdelete($id);
        return redirect()->route($this->sliderService->redirect)->with('success', 'Slider delete successfully');
    }

    /**
     * Toggle status flag
     */
    public function status($id)
    {
        $this->sliderService->sliderStatus($id);
        return redirect()->route($this->sliderService->redirect)->with('success', 'Slider status update successfully');
    }
}
