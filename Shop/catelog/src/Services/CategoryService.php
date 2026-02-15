<?php

namespace Shop\Catelog\Services;

use Illuminate\Support\Str;
use Shop\Admin\Classes\Helper;
use Shop\Catelog\Models\Category;

class CategoryService
{

    public $redirect = 'admin.category.index';
    public function categoryAll($request)
    {
        $query = Category::query();
        $search = $request->input('search');
        if ($search) {
            $query->where('name', 'like', "%$search%");
        }
        $categories = $query->with('parent')->paginate(15);
        return ['categories' => $categories, 'search' => $search];
    }

    public function getCategories()
    {
        return Category::whereNull('parent_id')->where('status',1)->get(['id', 'name']);
    }

    public function categoryById($id)
    {
        $category = Category::findOrFail($id);
        return $category;
    }

    public function categoryStore($request)
    {
        $icon = null;
        if ($request->icon) {
            $icon = Helper::fileUpload('category/icon', 'icon', $request->icon);
        }
        $banner = null;
        if ($request->banner) {
            $banner = Helper::fileUpload('category/banner', 'banner', $request->banner);
        }
        $picture = null;
        if ($request->picture) {
            $picture = Helper::fileUpload('category/picture', 'picture', $request->picture);
        }

        Category::create([
            'icon'                  => $icon,
            'banner'                => $banner,
            'picture'               => $picture,
            'parent_id'             => $request->category,
            'name'                  => $request->name,
            'slug'                  => Str::of($request->name)->slug('-'),
            'description'           => $request->description,
            'order_id'              => $request->order_id,

            'meta_title'            => $request->meta_title,
            'meta_description'      => $request->meta_description,
            'meta_keywords'         => $request->meta_keywords,

            'status'                => $request->status
        ]);
    }


    public function categoryUpdate($request, $id)
    {
        $category = Category::findOrFail($id);
        $icon = $category->icon;
        if ($request->icon) {
            Helper::fileDelete($category->icon);
            $icon = Helper::fileUpload('category/icon', 'icon', $request->icon);
        }
        $banner = $category->banner;
        if ($request->banner) {
            Helper::fileDelete($category->banner);
            $banner = Helper::fileUpload('category/banner', 'banner', $request->banner);
        }
        $picture = $category->picture;
        if ($request->picture) {
            Helper::fileDelete($category->picture);
            $picture = Helper::fileUpload('category/picture', 'picture', $request->picture);
        }

        $category->update([
            'icon'              => $icon,
            'banner'            => $banner,
            'picture'           => $picture,
            'parent_id'         => $request->category,
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

    public function categoryStatus($id)
    {
        $category = Category::findOrFail($id);
        $category->update([
            'status' => $category->status ^ 1
        ]);
    }

    public function categoryDelete($id)
    {
        $category = Category::findOrFail($id);
        Helper::fileDelete($category->icon);
        Helper::fileDelete($category->banner);
        Helper::fileDelete($category->picture);
        $category->delete();
    }
}
