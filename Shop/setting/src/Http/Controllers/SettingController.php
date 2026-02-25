<?php

namespace Shop\Setting\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Shop\Setting\Models\Setting;
use Shop\Setting\Services\SettingService;

class SettingController extends Controller
{
    public function __construct(protected SettingService $settingService) {}
    public function index()
    {
        $data = $this->settingService->getSetting();
        return view('setting::setting.index', ['setting' => $data]);
    }


    public function store(Request $request)
    {
        $request->validate([
            /*
    |--------------------------------------------------------------------------
    | General Settings
    |--------------------------------------------------------------------------
    */
            'site_logo'            => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'site_favicon'         => 'nullable|image|mimes:jpg,jpeg,png,ico|max:1024',
            'site_title'           => 'required|string|max:255',
            'site_description'     => 'nullable|string|max:1000',
            'site_footer_text'     => 'nullable|string|max:1000',

            /*
    |--------------------------------------------------------------------------
    | Social Links
    |--------------------------------------------------------------------------
    */
            'site_social'                => 'nullable|array',
            'site_social.*.icon'         => 'nullable|string|max:100',
            'site_social.*.title'        => 'nullable|string|max:100',
            'site_social.*.link'         => 'nullable|url|max:255',

            /*
    |--------------------------------------------------------------------------
    | Contact
    |--------------------------------------------------------------------------
    */
            'contact_email'        => 'nullable|email|max:255',
            'contact_phone'        => 'nullable|string|max:20',
            'contact_address'      => 'nullable|string|max:500',
            'contact_address_1'    => 'nullable|string|max:500',

            /*
    |--------------------------------------------------------------------------
    | SEO
    |--------------------------------------------------------------------------
    */
            'seo_og_image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'seo_meta_title'       => 'nullable|string|max:255',
            'seo_meta_description' => 'nullable|string|max:1000',
            'seo_meta_keywords'    => 'nullable|string|max:500',

            /*
    |--------------------------------------------------------------------------
    | Ecommerce
    |--------------------------------------------------------------------------
    */
            'ecommerce_currency'        => 'required|string|max:10',
            'ecommerce_currency_symbol' => 'required|string|max:10',

            /*
    |--------------------------------------------------------------------------
    | Shipping
    |--------------------------------------------------------------------------
    */
            'shipping_free_shipping_enabled'  => 'required|boolean',
            'shipping_free_shipping_minimum'  => 'nullable|numeric|min:0',
            'shipping_default_delivery_days'  => 'nullable|integer|min:0',
            'shipping_cash_on_delivery_fee'   => 'nullable|numeric|min:0',
            'shipping_return_days_limit'      => 'nullable|integer|min:0',

            /*
    |--------------------------------------------------------------------------
    | Order
    |--------------------------------------------------------------------------
    */
            'order_auto_confirm'     => 'required|boolean',
            'order_invoice_prefix'   => 'nullable|string|max:20',
            'order_note_enabled'     => 'required|boolean',

            /*
    |--------------------------------------------------------------------------
    | Invoice
    |--------------------------------------------------------------------------
    */
            'invoice_include_barcode'   => 'required|boolean',
            'invoice_watermark_enabled' => 'required|boolean',

            /*
    |--------------------------------------------------------------------------
    | Inventory
    |--------------------------------------------------------------------------
    */
            'inventory_low_stock_threshold'     => 'nullable|integer|min:0',
            'inventory_out_of_stock_visibility' => 'required|boolean',

            /*
    |--------------------------------------------------------------------------
    | Theme Colors
    |--------------------------------------------------------------------------
    */
            'theme_primary_color'        => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'theme_title_color'          => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'theme_text_color'           => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'theme_bg_color'             => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'theme_header_bg_color'      => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'theme_header_text_color'    => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'theme_footer_title_color'   => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'theme_footer_text_color'    => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'theme_footer_bg_color'      => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
        ]);

        $this->settingService->settingStore($request);
        return redirect()->route($this->settingService->redirect)->with('success','Setting Updated Successfully');
    }
}
