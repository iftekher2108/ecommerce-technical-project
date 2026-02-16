<?php

namespace Shop\Catelog\Services;

use Illuminate\Support\Str;
use Shop\Admin\Classes\Helper;
use Shop\Catelog\Models\Product;

class ProductService
{
    public $redirect = 'admin.product.index';

    public function productAll($request)
    {
        $query = Product::query();
        $search = $request->input('search');
        if ($search) {
            $query->where('name', 'like', "%$search%")->orWhere('sku', 'like', "%$search%");
        }
        $products = $query->paginate(15);
        return ['products' => $products, 'search' => $search];
    }

    public function productStore($request)
    {
        $banner = null;
        if ($request->banner) {
            $banner = Helper::fileUpload('product/banner', 'banner', $request->banner);
        }

        $picture = null;
        if ($request->picture) {
            $picture = Helper::fileUpload('product/picture', 'picture', $request->picture);
        }

        // Handle Multiple Images
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = Helper::fileUpload('product/images', 'image', $image);
            }
        }

        $product = Product::create([
            'name' => $request->name,
            'slug' => Str::of($request->name)->slug('-'),
            'sku'  => $request->sku,

            'picture' => $picture,
            'banner'  => $banner,
            'images'  => !empty($imagePaths) ? $imagePaths : null,

            'short_description' => $request->short_description,
            'description'       => $request->description,

            // SEO
            'meta_title'       => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords'    => $request->meta_keywords,

            'brand_id' => $request->brand_id,
            // 'product_attr_group_id' => $request->product_attr_group_id,

            'price'      => $request->price ?? 0,
            'sale_price' => $request->sale_price ?? 0,
            'cost_price' => $request->cost_price,

            'in_stock' => $request->in_stock ?? true,
            'stock'    => $request->stock ?? 1,

            'order_id'    => $request->order_id,
            'is_featured' => $request->is_featured ?? false,
            'status'      => $request->status ?? 1,
        ]);
        $product->categories()->attach($request->category);
    }

    public function productById($id)
    {
        $product = Product::findOrFail($id);
        return $product;
    }

    public function productUpdate($request, $id)
    {
        $product = Product::findOrFail($id);
        $banner = $product->banner;
        if ($request->banner) {
            Helper::fileDelete($product->banner);
            $banner = Helper::fileUpload('product/banner', 'banner', $request->banner);
        }

        $picture = $product->picture;
        if ($request->picture) {
            Helper::fileDelete($product->picture);
            $picture = Helper::fileUpload('product/picture', 'picture', $request->picture);
        }

        // Handle Multiple Images
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = Helper::fileUpload('product/images', 'image', $image);
            }
        }

        $product->update([
            'name' => $request->name,
            'slug' => Str::of($request->name)->slug('-'),
            'sku'  => $request->sku,

            'picture' => $picture,
            'banner'  => $banner,
            'images'  => !empty($imagePaths) ? $imagePaths : $product->images,

            'short_description' => $request->short_description,
            'description'       => $request->description,

            // SEO
            'meta_title'       => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords'    => $request->meta_keywords,

            'brand_id' => $request->brand_id,
            // 'product_attr_group_id' => $request->product_attr_group_id,

            'price'      => $request->price ?? 0,
            'sale_price' => $request->sale_price ?? 0,
            'cost_price' => $request->cost_price,

            'in_stock' => $request->in_stock ?? true,
            'stock'    => $request->stock ?? 1,

            'order_id'    => $request->order_id,
            'is_featured' => $request->is_featured ?? false,
            'status'      => $request->status ?? 1,
        ]);
        $product->categories()->sync($request->category);
    }

    public function productStatus($id)
    {
        $product = Product::findOrFail($id);
        $product->update([
            'status' => $product->status ^ 1
        ]);
    }

    public function productDelete($id) {
        $product = Product::findOrFail($id);
        Helper::fileDelete($product->picture);
        Helper::fileDelete($product->banner);
        foreach ($product->images as $image) {
            Helper::fileDelete($image);
        }
        $product->delete();
    }
}
