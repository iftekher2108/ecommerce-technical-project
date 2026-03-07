@extends('admin::layouts.app')
@section('title', 'New Product')

@section('content')
    <div class="card col-md-12 p-2">
        <div class="card-body">

            <form action="{{ route('admin.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <h5 class="p-2 bg-primary rounded mt-3">General Information</h5>

                {{-- Images --}}
                <div class="row g-2">
                    <div class="col-md-6">
                        <x-admin::form.picture-upload title="Picture" preview="{{ asset('storage/' . $product->picture) }}"
                            name="picture" help='Image diamension: 500x500px' />
                    </div>

                    <div class="col-md-6">
                        <x-admin::form.picture-upload title="Banner" preview="{{ asset('storage/' . $product->banner) }}"
                            name="banner" help='Image diamension: 1280x720px' />
                    </div>

                </div>

                <div class="row g-2">
                    <div class="col-md-12">
                        {{-- multiple images (json) --}}
                        <x-admin::form.picture-upload title="Gallery Images" :preview="$product->images
                            ? collect($product->images)->map(fn($img) => asset('storage/' . $img))->toArray()
                            : []" name="images[]"
                            help="You can select multiple images (diamension: 500x500px)" multiple="true" />
                    </div>
                </div>

                {{-- Basic --}}
                <div class="row g-2 mt-2">
                    <div class="col-md-6">
                        <x-admin::form.input name="name" value="{{ $product->name }}" required="true" title="Name" />
                    </div>


                    <div class="col-md-6">
                        <x-admin::form.input name="sku" value="{{ $product->sku }}" required="true" title="SKU" />
                    </div>
                </div>

                {{-- Descriptions --}}
                <div class="row g-2 mt-2">
                    <div class="col-md-12">
                        <x-admin::form.textarea name="short_description" value="{{ $product->short_description }}"
                            title="Short Description" />
                    </div>
                </div>

                <x-admin::form.textarea name="description" class="tinymce" value="{{ $product->description }}" title="Description" />

                {{-- Brand & Attribute Group --}}
                <div class="row g-2 mt-2">
                    <div class="col-md-6">
                        <x-admin::form.select title="Brand" name="brand_id" choose_text="Choose One">
                            @foreach ($brands as $item)
                                <x-admin::form.select.item :value="$item->id" :selected="$item->id == $product->brand_id" :label="$item->name" />
                            @endforeach
                        </x-admin::form.select>
                    </div>

                    <div class="col-md-6">
                        <x-admin::form.select title="Category" name="category[]" multiple='true'>
                            @foreach ($categories as $item)
                                <x-admin::form.select.item :value="$item->id" :selected="in_array($item->id, $product->categories->pluck('id')->toArray())" :label="$item->name" />
                            @endforeach
                        </x-admin::form.select>
                    </div>

                    {{-- <div class="col-md-6">
                        <x-admin::form.select title="Product Attribute Group" name="product_attr_group_id" choose_text="Choose One">
                            @foreach ($attributeGroups as $item)
                                <x-admin::form.select.item :value="$item->id" :label="$item->name" />
                            @endforeach
                        </x-admin::form.select>
                    </div> --}}
                </div>

                {{-- Pricing --}}
                <h5 class="p-2 bg-primary rounded mt-3">Pricing</h5>

                <div class="row g-2">
                    <div class="col-md-4">
                        <x-admin::form.input name="price" type="number" value="{{ $product->price }}" title="Price" required="true" />
                    </div>

                    <div class="col-md-4">
                        <x-admin::form.input name="sale_price" type="number" value="{{ $product->sale_price }}" title="Sale Price" />
                    </div>

                    <div class="col-md-4">
                        <x-admin::form.input name="cost_price" type="number" value="{{ $product->cost_price }}" title="Cost Price" />
                    </div>
                </div>

                {{-- Stock --}}
                <h5 class="p-2 bg-primary rounded mt-3">Stock</h5>

                <div class="row g-2">
                    <div class="col-md-6">
                        <x-admin::form.select title="In Stock Status" name="in_stock">
                            <x-admin::form.select.item value="0" :selected="$product->in_stock == 0" label="No" />
                            <x-admin::form.select.item value="1" :selected="$product->in_stock == 1" label="Yes" />
                        </x-admin::form.select>
                    </div>

                    <div class="col-md-6">
                        <x-admin::form.input name="stock" type="number" value="{{ $product->stock }}" title="Stock Quantity" />
                    </div>
                </div>

                {{-- Status & Flags --}}
                <h5 class="p-2 bg-primary rounded mt-3">Status & Flags</h5>

                <div class="row g-2">
                    <div class="col-md-4">
                        <x-admin::form.input name="order_id" type="number" value="{{ $product->order_id }}" title="Sort Order" />
                    </div>

                    <div class="col-md-4">
                        <x-admin::form.select title="Featured" name="is_featured">
                            <x-admin::form.select.item value="0" :selected="$product->is_featured == 0" label="No" />
                            <x-admin::form.select.item value="1" :selected="$product->is_featured == 1" label="Yes" />
                        </x-admin::form.select>
                    </div>

                    <div class="col-md-4">
                        <x-admin::form.select title="Status" name="status">
                            <x-admin::form.select.item value="1" label="Active" />
                            <x-admin::form.select.item value="0" label="Inactive" />
                        </x-admin::form.select>
                    </div>
                </div>

                {{-- SEO --}}
                <div class="card p-2 mt-3">
                    <h5 class="p-2 bg-primary rounded mt-3">SEO Information</h5>

                    <x-admin::form.checkbox id="sameAs" value="1" title="Same As" />

                    <x-admin::form.input name="meta_title" value="{{ $product->meta_title }}" title="Meta Title" />

                    <x-admin::form.textarea name="meta_description" value="{{ $product->meta_description }}" title="Meta Description" />

                    <x-admin::form.input name="meta_keywords" value="{{ $product->meta_keywords }}" title="Meta Keywords" />
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <x-admin::form.button class="btn-danger" type="reset">
                        <i class="bi bi-arrow-clockwise"></i>
                        Reset
                    </x-admin::form.button>

                    <x-admin::form.button class="btn-primary" type="submit">
                        <i class="bi bi-floppy-fill me-1"></i>
                        Update
                    </x-admin::form.button>
                </div>

            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $('#sameAs').change(function() {
            if ($(this).prop('checked')) {
                $("input[name='meta_title']").val($("input[name='name']").val());
                $("textarea[name='meta_description']").val($("textarea[name='short_description']").val() || $(
                    "textarea[name='description']").val());
            } else {
                $("input[name='meta_title']").val("{{ old('meta_title', $product->meta_title) }}");
                $("textarea[name='meta_description']").val("{{ old('meta_description', $product->meta_description) }}");
            }
        });
    </script>
@endpush
