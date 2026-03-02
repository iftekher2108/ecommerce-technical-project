<?php

namespace Shop\Appearance\Services;

use Shop\Admin\Classes\Helper;
use Shop\Appearance\Models\Slider;

class SliderService
{
    public $redirect = 'admin.slider.index';

    public function index($request)
    {
        $query = Slider::query();
        $search = $request->query('search');
        if ($search) {
            $query->where('title', 'like', "%{$search}%");
        }

        $sliders = $query->orderBy('order_id', 'asc')
            ->paginate(10)
            ->withQueryString();
        return [
            'sliders' => $sliders,
            'search' => $search
        ];
    }

    public function sliderStore($request)
    {
        $picture = null;
        if ($request->hasFile('picture')) {
            Helper::fileUpload('slider', 'slider', $request->picture);
            $picture = $request->file('picture')->store('sliders', 'public');
        }
        Slider::create([
            'order_id' => $request->order_id,
            'picture' => $picture,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'action' => $request->action,
            'status' => $request->status,
        ]);
    }

    public function sliderById($id) {
        $slider = Slider::findOrFail($id);
        return $slider;
    }

    public function sliderUpdate($request, $id)
    {
        $slider = Slider::findOrFail($id);
        $picture = $slider->picture;
        if ($request->hasFile('picture')) {
            Helper::fileDelete($slider->picture);
            $picture = Helper::fileUpload('slider', 'slider', $request->picture);
        }
        $slider->update([
            'order_id' => $request->order_id,
            'picture' => $picture,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'action' => $request->action,
            'status' => $request->status,
        ]);
    }

    public function sliderdelete($id) {
        $slider = Slider::findOrFail($id);
        if($slider->picture) {
            Helper::fileDelete($slider->picture);
        }
        $slider->delete();
    }

    public function sliderStatus($id) {
         $slider = Slider::findOrFail($id);
        $slider->update([
            'status' => $slider->status ^ 1
        ]);
    }

}
