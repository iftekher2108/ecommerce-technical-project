<?php

namespace Shop\Catelog\Services;

use Illuminate\Support\Str;
use Shop\Admin\Classes\Helper;
use Shop\Catelog\Models\Brand;

class BrandService
{
    public $redirect = 'admin.brand.index';
    public function brandAll($request)
    {
        $query = Brand::query();
        $search = $request->input('search');
        if ($search) {
            $query->where('name', 'like', "%$search%");
        }
        $brands = $query->paginate(15);
        return ['brands' => $brands, 'search' => $search];
    }

    public function getBrands() {
        $brands = Brand::where('status',1)->get(['id', 'name']);
        return $brands;
    }

    public function brandStore($request)
    {
        $icon = null;
        if ($request->icon) {
            $icon = Helper::fileUpload('brand/icon', 'icon', $request->icon);
        }
        $banner = null;
        if ($request->banner) {
            $banner = Helper::fileUpload('brand/banner', 'banner', $request->banner);
        }
        $picture = null;
        if ($request->picture) {
            $picture = Helper::fileUpload('brand/picture', 'picture', $request->picture);
        }

        Brand::create([
            'icon'              => $icon,
            'banner'            => $banner,
            'picture'           => $picture,
            'name'              => $request->name,
            'slug'              => Str::of($request->name)->slug('-'),
            'description'       => $request->description,
            'order_id'          => $request->order_id,

            'meta_title'        => $request->meta_title,
            'meta_description'  => $request->meta_description,
            'meta_keywords'     => $request->meta_keywords,

            'status'            => $request->status
        ]);
    }

    public function brandById($id)
    {
        $brand = Brand::findOrFail($id);
        return $brand;
    }

    public function brandUpdate($request, $id)
    {

        $brand = Brand::findOrFail($id);

        $icon = $brand->icon;
        if ($request->icon) {
            Helper::fileDelete($brand->icon);
            $icon = Helper::fileUpload('brand/icon', 'icon', $request->icon);
        }
        $banner = $brand->banner;
        if ($request->banner) {
            Helper::fileDelete($brand->banner);
            $banner = Helper::fileUpload('brand/banner', 'banner', $request->banner);
        }
        $picture = $brand->picture;
        if ($request->picture) {
            Helper::fileDelete($brand->picture);
            $picture = Helper::fileUpload('brand/picture', 'picture', $request->picture);
        }

        $brand->update([
            'icon'              => $icon,
            'banner'            => $banner,
            'picture'           => $picture,
            'name'              => $request->name,
            'slug'              => Str::of($request->name)->slug('-'),
            'description'       => $request->description,
            'order_id'          => $request->order_id,

            'meta_title'        => $request->meta_title,
            'meta_description'  => $request->meta_description,
            'meta_keywords'     => $request->meta_keywords,

            'status'            => $request->status
        ]);
    }

    public function brandStatus($id) {
        $brand = Brand::findOrFail($id);
        $brand->update([
            'status' => $brand->status ^ 1
        ]);
    }

    public function brandDelete($id) {
        $brand = Brand::findOrFail($id);
        Helper::fileDelete($brand->icon);
        Helper::fileDelete($brand->banner);
        Helper::fileDelete($brand->picture);
        $brand->delete();
    }

}
