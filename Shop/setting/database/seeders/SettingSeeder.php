<?php

namespace Shop\Setting\Database\Seeders;

use Illuminate\Database\Seeder;
use Shop\Setting\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
    |--------------------------------------------------------------------------
    | General Settings
    |--------------------------------------------------------------------------
    */
        Setting::set('site.logo', null);
        Setting::set('site.favicon', null);
        Setting::set('site.title', 'Shop');
        $socialLinks = [
            [
                'icon'  => 'bi-facebook',
                'title' => 'Facebook',
                'link'  => 'https://facebook.com/yourpage'
            ],
            [
                'icon'  => 'bi-twitter',
                'title' => 'Twitter',
                'link'  => 'https://twitter.com/yourpage'
            ],
            [
                'icon'  => 'bi-instagram',
                'title' => 'Instagram',
                'link'  => 'https://instagram.com/yourpage'
            ],
        ];

        // Social Setting model set 
        Setting::set('site.social', json_encode($socialLinks));

        Setting::set('site.tagline', 'Best Online Shopping Experience');
        Setting::set('site.description', 'Buy premium quality products at the best price.');
        Setting::set('site.language', 'en');
        Setting::set('site.timezone', 'Asia/Dhaka');
        Setting::set('site.footer_text', '© 2026 My Shop. All rights reserved.');

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

        Setting::set('theme.footer_title_color', '#ffffff');
        Setting::set('theme.footer_text_color', '#ffffff');
        Setting::set('theme.footer_bg_color', '#222222');


        // Setting::set('theme.dark_mode_enabled', true);
    }
}
