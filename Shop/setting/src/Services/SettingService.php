<?php

namespace Shop\Setting\Services;

use Shop\Admin\Classes\Helper;
use Shop\Setting\Models\Setting;

class SettingService
{
    public static function getSetting()
    {
        $data = [
            // General Settings
            'site.logo' => Setting::get('site.logo'),
            'site.favicon' => Setting::get('site.favicon'),
            'site.title' => Setting::get('site.title'),
            'site.tagline' => Setting::get('site.tagline'),
            'site.description' => Setting::get('site.description'),
            'site.social' => json_decode(Setting::get('site.social')),
            'site.language' => Setting::get('site.language'),
            'site.timezone' => Setting::get('site.timezone'),
            'site.footer_text' => Setting::get('site.footer_text'),

            // Contact Settings
            'contact.email' => Setting::get('contact.email'),
            'contact.phone' => Setting::get('contact.phone'),
            'contact.address' => Setting::get('contact.address'),
            'contact.address_1' => Setting::get('contact.address_1'),

            // Seo Settings
            'seo.meta_title' => Setting::get('seo.meta_title'),
            'seo.meta_description' => Setting::get('seo.meta_description'),
            'seo.meta_keywords' => Setting::get('seo.meta_keywords'),
            'seo.og_image' => Setting::get('seo.og_image'),

            // Currency Settings
            'ecommerce.currency' => Setting::get('ecommerce.currency'),
            'ecommerce.currency_symbol' => Setting::get('ecommerce.currency_symbol'),
            'ecommerce.min_order_amount' => Setting::get('ecommerce.min_order_amount'),

            // Shipping Settings
            'shipping.free_shipping_enabled' => Setting::get('shipping.free_shipping_enabled'),
            'shipping.free_shipping_minimum' => Setting::get('shipping.free_shipping_minimum'),
            'shipping.default_delivery_days' => Setting::get('shipping.default_delivery_days'),
            'shipping.cash_on_delivery_fee' => Setting::get('shipping.cash_on_delivery_fee'),
            'shipping.return_days_limit' => Setting::get('shipping.return_days_limit'),

            // mail config
            'email.from_name' => Setting::get('email.from_name'),
            'email.from_email' => Setting::get('email.from_email'),
            'email.order_notification' => Setting::get('email.order_notification'),

            // Maintance Settings
            'site.maintenance_mode' => Setting::get('site.maintenance_mode'),
            'site.maintenance_message' => Setting::get('site.maintenance_message'),

            // Order Settings
            'order.auto_confirm' => Setting::get('order.auto_confirm'),
            'order.invoice_prefix' => Setting::get('order.invoice_prefix'),
            'order.allow_guest_checkout' => Setting::get('order.allow_guest_checkout'),
            'order.order_note_enabled' => Setting::get('order.order_note_enabled'),

            // Inventory Settings
            'inventory.low_stock_threshold' => Setting::get('inventory.low_stock_threshold'),
            'inventory.out_of_stock_visibility' => Setting::get('inventory.out_of_stock_visibility'),

            // Customer Settings
            'customer.email_verification_required' => Setting::get('customer.email_verification_required'),
            'customer.default_role' => Setting::get('customer.default_role'),
            'customer.allow_profile_edit' => Setting::get('customer.allow_profile_edit'),
            'customer.account_delete_enabled' => Setting::get('customer.account_delete_enabled'),

            // Payment Settings
            'payment.bkash_enabled' => Setting::get('payment.bkash_enabled'),
            'payment.nagad_enabled' => Setting::get('payment.nagad_enabled'),
            'payment.rocket_enabled' => Setting::get('payment.rocket_enabled'),

            // Notification Settings
            'notification.email_enabled' => Setting::get('notification.email_enabled'),
            'notification.sms_enabled' => Setting::get('notification.sms_enabled'),
            'notification.admin_order_alert' => Setting::get('notification.admin_order_alert'),

            // Invoice Settings
            'invoice.include_barcode' => Setting::get('invoice.include_barcode'),
            'invoice.watermark_enabled' => Setting::get('invoice.watermark_enabled'),

            // Front Settings
            'theme.primary_color' => Setting::get('theme.primary_color'),

            'theme.title_color' => Setting::get('theme.title_color'),
            'theme.text_color' => Setting::get('theme.text_color'),
            'theme.bg_color' => Setting::get('theme.bg_color'),

            'theme.header_bg_color' => Setting::get('theme.header_bg_color'),
            'theme.header_text_color' => Setting::get('theme.header_text_color'),

            'theme.footer_title_color' => Setting::get('theme.footer_title_color'),
            'theme.footer_text_color' => Setting::get('theme.footer_text_color'),
            'theme.footer_bg_color' => Setting::get('theme.footer_bg_color'),

        ];
        return $data;
    }

    public function settingStore($request)
    {
        /*
    |--------------------------------------------------------------------------
    | General Settings
    |--------------------------------------------------------------------------
    */
        $setting = $this->getSetting();

        $site_logo = $setting['site.logo'];
        if ($request->site_logo) {
            Helper::fileDelete($site_logo);
            $site_logo = Helper::fileUpload('logo', 'logo', $request->site_logo);
        }
        Setting::set('site.logo', $site_logo);

        $site_favicon = $setting['site.favicon'];
        if ($request->site_favicon) {
            Helper::fileDelete($site_favicon);
            $site_favicon = Helper::fileUpload('favicon', 'favicon', $request->site_favicon);
        }
        Setting::set('site.favicon', $site_favicon);

        Setting::set('site.title', $request->site_title);
        
        // Social Setting model set 
        Setting::set('site.social', json_encode($request->site_social));

        Setting::set('site.tagline', $request->site_tagline);
        Setting::set('site.description', $request->site_description);
        // Setting::set('site.language', 'en');
        // Setting::set('site.timezone', 'Asia/Dhaka');
        Setting::set('site.footer_text', $request->site_footer_text);

        /*
    |--------------------------------------------------------------------------
    | Contact Information
    |--------------------------------------------------------------------------
    */
        Setting::set('contact.email', 'support@myshop.com');
        Setting::set('contact.phone', '+880123456789');
        Setting::set('contact.address', 'Dhaka, Bangladesh');
        Setting::set('contact.address_1', 'Dhaka, Bangladesh');

        /*
    |--------------------------------------------------------------------------
    | SEO Settings
    |--------------------------------------------------------------------------
    */
        Setting::set('seo.meta_title', 'My Shop - Online Store');
        Setting::set('seo.meta_description', 'Best ecommerce platform in Bangladesh.');
        Setting::set('seo.meta_keywords', 'ecommerce, online shop, buy online');
        Setting::set('seo.og_image', null);

        /*
    |--------------------------------------------------------------------------
    | E-commerce Core Settings
    |--------------------------------------------------------------------------
    */
        Setting::set('ecommerce.currency', 'BDT');
        Setting::set('ecommerce.currency_symbol', '৳');
        // Setting::set('ecommerce.tax_percentage', 5);
        // Setting::set('ecommerce.tax_included', false);
        Setting::set('ecommerce.min_order_amount', null);

        /*
    |--------------------------------------------------------------------------
    | Shipping Settings
    |--------------------------------------------------------------------------
    */
        Setting::set('shipping.free_shipping_enabled', false);
        Setting::set('shipping.free_shipping_minimum', 2000);
        // Setting::set('shipping.flat_rate', 100);
        Setting::set('shipping.default_delivery_days', 3);
        Setting::set('shipping.cash_on_delivery_fee', null);
        Setting::set('shipping.return_days_limit', 7);

        /*
    |--------------------------------------------------------------------------
    | Email Configuration
    |--------------------------------------------------------------------------
    */
        Setting::set('email.from_name', 'My Shop');
        Setting::set('email.from_email', 'no-reply@myshop.com');
        Setting::set('email.order_notification', false);


        //     /*
        // |--------------------------------------------------------------------------
        // | Analytics & Tracking
        // |--------------------------------------------------------------------------
        // */
        //     Setting::set('analytics.google_analytics_id', null);
        //     Setting::set('analytics.facebook_pixel_id', null);


        /*
    |--------------------------------------------------------------------------
    | Maintenance Mode
    |--------------------------------------------------------------------------
    */
        Setting::set('site.maintenance_mode', false);
        Setting::set('site.maintenance_message', 'We are updating our store. Please come back later.');

        /*
    |--------------------------------------------------------------------------
    | Order Settings
    |--------------------------------------------------------------------------
    */
        Setting::set('order.auto_confirm', false);
        // Setting::set('order.auto_cancel_minutes', 30);
        Setting::set('order.invoice_prefix', 'INV-');
        // Setting::set('order.invoice_start_number', 1000);
        Setting::set('order.allow_guest_checkout', true);
        Setting::set('order.order_note_enabled', true);

        /*
    |--------------------------------------------------------------------------
    | Inventory Settings
    |--------------------------------------------------------------------------
    */
        Setting::set('inventory.low_stock_threshold', 5);
        Setting::set('inventory.out_of_stock_visibility', false);


        /*
    |--------------------------------------------------------------------------
    | Customer Settings
    |--------------------------------------------------------------------------
    */
        Setting::set('customer.email_verification_required', false);
        // Setting::set('customer.phone_verification_required', false);
        Setting::set('customer.default_role', 'customer');
        Setting::set('customer.allow_profile_edit', true);
        Setting::set('customer.account_delete_enabled', false);

        /*
    |--------------------------------------------------------------------------
    | Payment Settings
    |--------------------------------------------------------------------------
    */
        Setting::set('payment.bkash_enabled', false);
        Setting::set('payment.nagad_enabled', false);
        Setting::set('payment.rocket_enabled', false);

        // Setting::set('security.login_attempt_limit', 5);


        Setting::set('notification.email_enabled', false);
        Setting::set('notification.sms_enabled', false);
        Setting::set('notification.admin_order_alert', false);

        /*
    |--------------------------------------------------------------------------
    | Invoice Settings
    |--------------------------------------------------------------------------
    */
        Setting::set('invoice.include_barcode', false);
        Setting::set('invoice.watermark_enabled', false);


        /*
    |--------------------------------------------------------------------------
    | Theme Settings
    |--------------------------------------------------------------------------
    */
        Setting::set('theme.primary_color', '#dd2222');
        // Setting::set('theme.secondary_color', '#ffffff');

        Setting::set('theme.title_color', '#fbb710');
        Setting::set('theme.text_color', '#222222');
        Setting::set('theme.bg_color', '#f9f9f9');

        Setting::set('theme.header_bg_color', '#f9f9f9');
        Setting::set('theme.header_text_color', '#222222');

        Setting::set('theme.footer_title_color', '#fff');
        Setting::set('theme.footer_text_color', '#222222');
        Setting::set('theme.footer_bg_color', '#fff');
    }

    public function getFrontSetting() {}

    public function getAdminSetting() {}
}
