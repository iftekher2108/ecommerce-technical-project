<?php

namespace Shop\Setting\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = [];
    
      // Get setting
    public static function get($key, $default = null)
    {
        return cache()->rememberForever("setting.$key", function () use ($key, $default) {
            return static::where('key', $key)->value('value') ?? $default;
        });
    }

    // Update setting
    public static function set($key, $value)
    {
        $setting = static::updateOrCreate(['key' => $key], ['value' => $value]);
        cache()->forget("setting.$key"); // clear cache
        return $setting;
    }

}
