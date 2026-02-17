<?php

namespace Shop\Setting\Services;

use Shop\Setting\Models\Setting;

class SettingService {
    public function getSetting() {
        $data = [
            'logo' => Setting::get('logo'),
            'icon' => Setting::get('icon'),
            'title' => Setting::get('title'),
            'description' =>Setting::get('description'),
            'social' => json_encode(Setting::get('social')),
            
        ];
        return [
           'setting' => $data 
        ];
    }

    public function settingStore($request) {

    }

}