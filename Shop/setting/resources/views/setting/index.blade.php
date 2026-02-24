@extends('admin::layouts.app')
@section('title', 'Setting Management')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.setting.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-general-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-general" type="button" role="tab" aria-controls="nav-general"
                            aria-selected="true">General</button>

                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                            type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button>

                        <button class="nav-link" id="nav-seo-tab" data-bs-toggle="tab" data-bs-target="#nav-seo"
                            type="button" role="tab" aria-controls="nav-seo" aria-selected="false">Seo</button>

                        <button class="nav-link" id="nav-ecommerce-tab" data-bs-toggle="tab" data-bs-target="#nav-ecommerce"
                            type="button" role="tab" aria-controls="nav-ecommerce"
                            aria-selected="false">Ecommerce</button>

                        {{-- <button class="nav-link" id="nav-customer-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-customer" type="button" role="tab" aria-controls="nav-customer"
                            aria-selected="false">Customer</button> --}}

                        <button class="nav-link" id="nav-front-theme-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-front-theme" type="button" role="tab" aria-controls="nav-front-theme"
                            aria-selected="false">Color Theme</button>


                    </div>
                </nav>
                <div class="tab-content mb-3 p-2" id="nav-tabContent">

                    <div class="tab-pane fade show active" id="nav-general" role="tabpanel"
                        aria-labelledby="nav-general-tab" tabindex="0">
                        <div class="row g-2">

                            <div class="col-md-6">
                                <x-admin::form.picture-upload title="Logo"
                                    preview="{{ asset('storage/' . $setting['site.logo']) }}" name="site_logo" />
                            </div>

                            <div class="col-md-6">
                                <x-admin::form.picture-upload title="Icon"
                                    preview="{{ asset('storage/' . $setting['site.favicon']) }}" name="site_favicon" />
                            </div>

                            <div class="col-md-12">
                                <x-admin::form.input name='site_title' value="{{ $setting['site.title'] }}" required='true'
                                    title="Title" />
                            </div>

                            <div class="col-md-6">
                                <x-admin::form.textarea name='site_description' value="{{ $setting['site.description'] }}"
                                    title="Description" />
                            </div>
                            <div class="col-md-6">
                                <x-admin::form.textarea name='site_footer_text' value="{{ $setting['site.footer_text'] }}"
                                    title="Footer Text" />
                            </div>

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="d-flex justify-content-between">
                                            <h5>Social Link</h5>
                                            <x-admin::form.button class="btn-primary add-social-btn">
                                                <i class="bi bi-plus-lg"></i>
                                                Add New
                                            </x-admin::form.button>
                                        </div>

                                        <div class="social-container my-3">
                                            @foreach ($setting['site.social'] as $social)
                                                <div class="social-item row g-2">
                                                    <div class="col">
                                                        <x-admin::form.input name="site_social[][icon]"
                                                            value="{{ $social->icon }}" placeholder="Icon" />
                                                    </div>
                                                    <div class="col">
                                                        <x-admin::form.input name='site_social[][title]'
                                                            value="{{ $social->title }}" placeholder="title" />
                                                    </div>
                                                    <div class="col">
                                                        <x-admin::form.input name='site_social[][link]'
                                                            value="{{ $social->link }}" placeholder="link" />
                                                    </div>
                                                    <div class="col-1">
                                                        <x-admin::form.button class="btn-danger social-item-remove">
                                                            <i class="bi bi-trash"></i>
                                                        </x-admin::form.button>
                                                    </div>
                                                </div>
                                            @endforeach
                                            {{-- <div class="social-item row g-2">
                                                <div class="col">
                                                    <x-admin::form.input name="social[][icon]" placeholder="Icon" />
                                                </div>
                                                <div class="col">
                                                    <x-admin::form.input name='social[][title]' placeholder="title" />
                                                </div>
                                                <div class="col">
                                                    <x-admin::form.input name='social[][link]' placeholder="link" />
                                                </div>
                                                <div class="col-1">
                                                    <x-admin::form.button class="btn-danger social-item-remove">
                                                        <i class="bi bi-trash"></i>
                                                    </x-admin::form.button>
                                                </div>
                                            </div> --}}

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"
                        tabindex="0">
                        <div class="row g-2">

                            <div class="col-md-6">
                                <x-admin::form.input name="contact_email" title="Email"
                                    value="{{ $setting['contact.email'] }}" placeholder="contact Email" />
                            </div>

                            <div class="col-md-6">
                                <x-admin::form.input name="contact_phone" title="Phone"
                                    value="{{ $setting['contact.phone'] }}" placeholder="contact Phone" />
                            </div>

                            <div class="col-md-6">
                                <x-admin::form.textarea name='contact_address' value="{{ $setting['contact.address'] }}"
                                    title="Address" />
                            </div>

                            <div class="col-md-6">
                                <x-admin::form.textarea name='contact_address_1'
                                    value="{{ $setting['contact.address_1'] }}" title="Address Second" />
                            </div>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-seo" role="tabpanel" aria-labelledby="nav-seo-tab"
                        tabindex="0">
                        <div class="row g-2">

                            <div class="col-md-6">
                                <x-admin::form.picture-upload title="Og Image"
                                    preview="{{ asset('storage/' . $setting['seo.og_image']) }}" name="seo_og_image" />
                            </div>

                            <div class="col-md-12">
                                <x-admin::form.input name="seo_meta_title" title="Meta Title"
                                    value="{{ $setting['seo.meta_title'] }}" placeholder="Seo meta_title" />
                            </div>

                            <div class="col-md-6">
                                <x-admin::form.textarea name="seo_meta_description" title="Meta Description"
                                    value="{{ $setting['seo.meta_description'] }}" placeholder="Seo meta_description" />
                            </div>

                            <div class="col-md-6">
                                <x-admin::form.textarea name="seo_meta_keywords" title="Meta Keywords"
                                    value="{{ $setting['seo.meta_keywords'] }}" placeholder="Seo meta_keywords" />
                            </div>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-ecommerce" role="tabpanel" aria-labelledby="nav-ecommerce-tab"
                        tabindex="0">

                        <div class="row g-2">
                            <h5 class="bg-primary p-2 rounded">Currency</h5>

                            <div class="col-md-6">
                                <x-admin::form.input name="ecommerce_currency" title="Currency"
                                    value="{{ $setting['ecommerce.currency'] }}" placeholder="Currency" />
                            </div>

                            <div class="col-md-6">
                                <x-admin::form.input name="ecommerce_currency_symbol" title="Currency Symbol"
                                    value="{{ $setting['ecommerce.currency_symbol'] }}" placeholder="currency_symbol" />
                            </div>

                            <h5 class="bg-primary p-2 rounded">Shipping</h5>

                            <div class="col-md-6">
                                <x-admin::form.select title="Free Shipping Enabled" name="shipping_free_shipping_enabled">
                                    <x-admin::form.select.item value="1" :selected="$setting['shipping.free_shipping_enabled'] == 1" label="Yes" />
                                    <x-admin::form.select.item value="0" :selected="$setting['shipping.free_shipping_enabled'] == 0" label="No" />
                                </x-admin::form.select>
                            </div>

                            <div class="col-md-6">
                                <x-admin::form.input name="shipping_free_shipping_minimum" title="Free Shipping Minimum"
                                    value="{{ $setting['shipping.free_shipping_minimum'] }}" type='number'
                                    placeholder="0.00" />
                            </div>

                            <div class="col-md-6">
                                <x-admin::form.input name="shipping_default_delivery_days" title="Default Delivery Days"
                                    value="{{ $setting['shipping.default_delivery_days'] }}" type='number'
                                    placeholder="0" />
                            </div>

                            <div class="col-md-6">
                                <x-admin::form.input name="shipping_cash_on_delivery_fee" title="Cash on delivery fee"
                                    value="{{ $setting['shipping.cash_on_delivery_fee'] }}" type='number'
                                    placeholder="0.00" />
                            </div>

                            <div class="col-md-6">
                                <x-admin::form.input type='number' name="shipping_return_days_limit"
                                    title="Shipping return days limit"
                                    value="{{ $setting['shipping.return_days_limit'] }}" type='number'
                                    placeholder="0" />
                            </div>

                        </div>

                        <h5 class="bg-primary p-2 rounded">Order</h5>

                        <div class="row g-2">

                            <div class="col-md-6">
                                <x-admin::form.select title="Order auto confirm" name="order.auto_confirm">
                                    <x-admin::form.select.item value="1" :selected="$setting['order.auto_confirm'] == 1" label="Yes" />
                                    <x-admin::form.select.item value="0" :selected="$setting['order.auto_confirm'] == 0" label="No" />
                                </x-admin::form.select>
                            </div>

                            <div class="col-md-6">
                                <x-admin::form.input name="order_invoice_prefix" title="Order invoice prefix"
                                    value="{{ $setting['order.invoice_prefix'] }}" placeholder="INV-" />
                            </div>

                            {{-- <div class="col-md-6">
                                <x-admin::form.select title="allow guest checkout" name="order_allow_guest_checkout">
                                    <x-admin::form.select.item value="1" :selected="$setting['order.allow_guest_checkout'] == 1" label="Yes" />
                                    <x-admin::form.select.item value="0" :selected="$setting['order.allow_guest_checkout'] == 0" label="No" />
                                </x-admin::form.select>
                            </div> --}}

                            <div class="col-md-6">
                                <x-admin::form.select title="Order note enabled" name="order_note_enabled">
                                    <x-admin::form.select.item value="1" :selected="$setting['order.order_note_enabled'] == 1" label="Yes" />
                                    <x-admin::form.select.item value="0" :selected="$setting['order.order_note_enabled'] == 0" label="No" />
                                </x-admin::form.select>
                            </div>

                        </div>

                        <h5 class="bg-primary p-2 rounded">Invoice</h5>

                        <div class="row g-2">

                            <div class="col-md-6">
                                <x-admin::form.select title="Invoice include barcode" name="invoice_include_barcode">
                                    <x-admin::form.select.item value="1" :selected="$setting['invoice.include_barcode'] == 1" label="Yes" />
                                    <x-admin::form.select.item value="0" :selected="$setting['invoice.include_barcode'] == 0" label="No" />
                                </x-admin::form.select>
                            </div>

                            <div class="col-md-6">
                                <x-admin::form.select title="Invoice watermark enabled" name="invoice_watermark_enabled">
                                    <x-admin::form.select.item value="1" :selected="$setting['invoice.watermark_enabled'] == 1" label="Yes" />
                                    <x-admin::form.select.item value="0" :selected="$setting['invoice.watermark_enabled'] == 0" label="No" />
                                </x-admin::form.select>
                            </div>

                        </div>

                        <h5 class="bg-primary p-2 rounded">Inventory</h5>

                        <div class="row g-2">

                            <div class="col-md-6">
                                <x-admin::form.input name="inventory.low_stock_threshold" title="Low stock threshold"
                                    value="{{ $setting['inventory.low_stock_threshold'] }}" type='number'
                                    placeholder="0" />
                            </div>

                            <div class="col-md-6">
                                <x-admin::form.select title="Out of stock visibility"
                                    name="inventory_out_of_stock_visibility">
                                    <x-admin::form.select.item value="1" :selected="$setting['inventory.out_of_stock_visibility'] == 1" label="Yes" />
                                    <x-admin::form.select.item value="0" :selected="$setting['inventory.out_of_stock_visibility'] == 0" label="No" />
                                </x-admin::form.select>
                            </div>

                        </div>

                    </div>

                    {{-- <div class="tab-pane fade" id="nav-customer" role="tabpanel"
                        aria-labelledby="nav-customer-tab" tabindex="0">
                        ...
                    </div> --}}

                    <div class="tab-pane fade" id="nav-front-theme" role="tabpanel"
                        aria-labelledby="nav-front-theme-tab" tabindex="0">

                        <div class="row g-2">

                            {{-- <div class="col-md-6">
                                <x-admin::form.input name="order_invoice_prefix" title="Order invoice prefix"
                                    value="{{ $setting['order.invoice_prefix'] }}" placeholder="INV-" />
                            </div> --}}

                            <div class="col-md-6">
                                <x-admin::form.input name="theme_primary_color" title="Primary Color"
                                    value="{{ $setting['theme.primary_color'] }}" type='color' />
                            </div>

                            <div class="col-md-6">
                                <x-admin::form.input name="theme_title_color" title="Title Color"
                                    value="{{ $setting['theme.title_color'] }}" type='color' />
                            </div>

                            <div class="col-md-6">
                                <x-admin::form.input name="theme_text_color" title="Text Color"
                                    value="{{ $setting['theme.text_color'] }}" type='color' />
                            </div>

                            <div class="col-md-6">
                                <x-admin::form.input name="theme_bg_color" title="Background Color"
                                    value="{{ $setting['theme.bg_color'] }}" type='color' />
                            </div>

                            <div class="col-md-6">
                                <x-admin::form.input name="theme_header_bg_color" title="Header Background Color"
                                    value="{{ $setting['theme.header_bg_color'] }}" type='color' />
                            </div>

                            <div class="col-md-6">
                                <x-admin::form.input name="theme_header_text_color" title="Header Text Color"
                                    value="{{ $setting['theme.header_text_color'] }}" type='color' />
                            </div>

                            <div class="col-md-6">
                                <x-admin::form.input name="theme_footer_title_color" title="Footer Title Color"
                                    value="{{ $setting['theme.footer_title_color'] }}" type='color' />
                            </div>

                            <div class="col-md-6">
                                <x-admin::form.input name="theme_footer_text_color" title="Footer Title Color"
                                    value="{{ $setting['theme.footer_text_color'] }}" type='color' />
                            </div>

                            <div class="col-md-6">
                                <x-admin::form.input name="theme_footer_bg_color" title="Footer Background Color"
                                    value="{{ $setting['theme.footer_bg_color'] }}" type='color' />
                            </div>

                        </div>

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
        $('.add-social-btn').click(function() {
            let html = `
            <div class="social-item row g-2">
                    <div class="col">
                        <x-admin::form.input name="site_social[][icon]" placeholder="Icon" />
                    </div>
                    <div class="col">
                        <x-admin::form.input name='site_social[][title]' placeholder="title" />
                    </div>
                    <div class="col">
                        <x-admin::form.input name='site_social[][link]' placeholder="link" />
                    </div>
                    <div class="col-1">
                        <x-admin::form.button class="btn-danger social-item-remove">
                            <i class="bi bi-trash"></i>
                        </x-admin::form.button>
                    </div>
                </div>`;
            if ($('.social-item').length < 6) {
                $('.social-container').append(html);
            } else {
                alert("you can't added more then 6!")
            }
        })

        $(document).on('click', '.social-item-remove', function() {
            $(this).closest('.social-item').slideUp(300, function() {
                $(this).remove();
            });
        })
    </script>
@endpush
