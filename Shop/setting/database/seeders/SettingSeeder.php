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
        Setting::set('logo', null);
        Setting::set('icon', null);
        Setting::set('title', 'Shop');
        Setting::set('description', 'Description Here');
        Setting::set('social', []);
        // Setting::set();
    }
}
