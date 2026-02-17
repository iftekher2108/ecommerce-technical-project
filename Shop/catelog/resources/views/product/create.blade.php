@extends('admin::layouts.app')
@section('title', 'New Product')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-general-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-general" type="button" role="tab" aria-controls="nav-general"
                            aria-selected="true">General Information</button>
                        <button class="nav-link" id="nav-image-tab" data-bs-toggle="tab" data-bs-target="#nav-image"
                            type="button" role="tab" aria-controls="nav-image" aria-selected="false">Image</button>
                        <button class="nav-link" id="nav-price-tab" data-bs-toggle="tab" data-bs-target="#nav-price"
                            type="button" role="tab" aria-controls="nav-price" aria-selected="false">Price</button>
                        <button class="nav-link" id="nav-seo-tab" data-bs-toggle="tab" data-bs-target="#nav-seo"
                            type="button" role="tab" aria-controls="nav-seo" aria-selected="false">Seo</button>
                        <button class="nav-link" id="nav-other-tab" data-bs-toggle="tab" data-bs-target="#nav-other"
                            type="button" role="tab" aria-controls="nav-other" aria-selected="false">Other</button>
                    </div>
                </nav>
                <div class="tab-content mb-3 p-2" id="nav-tabContent">

                    <div class="tab-pane fade show active" id="nav-general" role="tabpanel"
                        aria-labelledby="nav-general-tab" tabindex="0">

                        <h5 class="p-2 bg-primary rounded mt-3">General Information</h5>
                        {{-- Basic --}}
                        <div class="row g-2 mt-2">
                            <div class="col-md-6">
                                <x-admin::form.input name="name" value="{{ old('name') }}" required="true"
                                    title="Name" />
                            </div>


                            <div class="col-md-6">
                                <x-admin::form.input name="sku" value="{{ old('sku') }}" required="true"
                                    title="SKU" />
                            </div>
                        </div>


                        <x-admin::form.textarea name="short_description" value="{{ old('short_description') }}"
                            title="Short Description" />

                        <x-admin::form.textarea name="description" value="{{ old('description') }}" title="Description" />

                        {{-- Brand & Attribute Group --}}
                        <div class="row g-2 mt-2">
                            <div class="col-md-6">
                                <x-admin::form.select title="Brand" name="brand_id" choose_text="Choose One">
                                    @foreach ($brands as $item)
                                        <x-admin::form.select.item :value="$item->id" :label="$item->name" />
                                    @endforeach
                                </x-admin::form.select>
                            </div>

                            <div class="col-md-6">
                                <x-admin::form.select title="Category" name="category[]" multiple='true'>
                                    @foreach ($categories as $item)
                                        <x-admin::form.select.item :value="$item->id" :label="$item->name" />
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


                    </div>

                    <div class="tab-pane fade" id="nav-image" role="tabpanel" aria-labelledby="nav-image-tab"
                        tabindex="0">

                        <h5 class="p-2 bg-primary rounded mt-3">Image Information</h5>

                        {{-- Images --}}
                        <div class="row g-2">
                            <div class="col-md-6">
                                <x-admin::form.picture-upload title="Picture" name="picture" />
                            </div>

                            <div class="col-md-6">
                                <x-admin::form.picture-upload title="Banner" name="banner" />
                            </div>

                        </div>

                        <div class="row g-2">
                            <div class="col-md-12">
                                {{-- multiple images (json) --}}
                                <x-admin::form.picture-upload title="Gallery Images" name="images[]"
                                    help="You can select multiple images" multiple="true" />
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="nav-price" role="tabpanel" aria-labelledby="nav-price-tab"
                        tabindex="0">

                        {{-- Pricing --}}
                        <h5 class="p-2 bg-primary rounded mt-3">Pricing</h5>

                        <div class="row g-2">
                            <div class="col-md-4">
                                <x-admin::form.input name="price" type="number" value="{{ old('price') }}"
                                    title="Price" required="true" />
                            </div>

                            <div class="col-md-4">
                                <x-admin::form.input name="sale_price" type="number" value="{{ old('sale_price') }}"
                                    title="Sale Price" />
                            </div>

                            <div class="col-md-4">
                                <x-admin::form.input name="cost_price" type="number" value="{{ old('cost_price') }}"
                                    title="Cost Price" />
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="nav-seo" role="tabpanel" aria-labelledby="nav-seo-tab"
                        tabindex="0">

                        <h5 class="p-2 bg-primary rounded mt-3">SEO Information</h5>

                        <x-admin::form.checkbox id="sameAs" value="1" title="Same As" />

                        <x-admin::form.input name="meta_title" value="{{ old('meta_title') }}" title="Meta Title" />

                        <x-admin::form.textarea name="meta_description" value="{{ old('meta_description') }}"
                            title="Meta Description" />

                        <x-admin::form.input name="meta_keywords" value="{{ old('meta_keywords') }}"
                            title="Meta Keywords" />

                    </div>

                    <div class="tab-pane fade" id="nav-other" role="tabpanel" aria-labelledby="nav-other-tab"
                        tabindex="0">
                        {{-- Stock --}}
                        <h5 class="p-2 bg-primary rounded mt-3">Stock</h5>

                        <div class="row g-2">
                            <div class="col-md-6">
                                <x-admin::form.select title="In Stock Status" name="in_stock">
                                    <x-admin::form.select.item value="1" label="Yes" />
                                    <x-admin::form.select.item value="0" label="No" />
                                </x-admin::form.select>
                            </div>

                            <div class="col-md-6">
                                <x-admin::form.input name="stock" type="number" value="{{ old('stock') }}"
                                    title="Stock Quantity" />
                            </div>
                        </div>

                        {{-- Status & Flags --}}
                        <h5 class="p-2 bg-primary rounded mt-3">Status & Flags</h5>

                        <div class="row g-2">
                            <div class="col-md-4">
                                <x-admin::form.input name="order_id" type="number" value="{{ old('order_id') }}"
                                    title="Sort Order" />
                            </div>

                            <div class="col-md-4">
                                <x-admin::form.select title="Featured" name="is_featured">
                                    <x-admin::form.select.item value="0" label="No" />
                                    <x-admin::form.select.item value="1" label="Yes" />
                                </x-admin::form.select>
                            </div>

                            <div class="col-md-4">
                                <x-admin::form.select title="Status" name="status">
                                    <x-admin::form.select.item value="1" label="Active" />
                                    <x-admin::form.select.item value="0" label="Inactive" />
                                </x-admin::form.select>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-alternative" role="tabpanel"
                        aria-labelledby="nav-alternative-tab" tabindex="0">
                        ...
                    </div>


                </div>


                <div class="d-flex justify-content-between">
                    <x-admin::form.button class="btn-danger" type='reset'>
                        <i class="bi bi-arrow-clockwise"></i>
                        Reset
                    </x-admin::form.button>

                    <x-admin::form.button class="btn-primary" type='submit'>
                        <i class="bi bi-floppy-fill me-1"></i>
                        Submit
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
                $("input[name='meta_title']").val('');
                $("textarea[name='meta_description']").val('');
            }
        });
    </script>
@endpush
