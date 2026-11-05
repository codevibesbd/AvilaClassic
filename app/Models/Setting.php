<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'group',
        'type',
    ];

    /**
     * Retrieve a setting value by key, with optional default fallback.
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        $settings = Cache::rememberForever('site_settings_all', function () {
            return static::pluck('value', 'key')->all();
        });

        if (array_key_exists($key, $settings) && ! is_null($settings[$key]) && $settings[$key] !== '') {
            return $settings[$key];
        }

        return $default;
    }

    /**
     * Store or update a setting.
     */
    public static function set(string $key, mixed $value, string $group = 'general', string $type = 'string'): static
    {
        $setting = static::updateOrCreate(
            ['key' => $key],
            [
                'value' => is_array($value) ? json_encode($value) : $value,
                'group' => $group,
                'type' => $type,
            ]
        );

        Cache::forget('site_settings_all');

        return $setting;
    }

    /**
     * Clear the cache on save or delete.
     */
    protected static function booted(): void
    {
        static::saved(fn () => Cache::forget('site_settings_all'));
        static::deleted(fn () => Cache::forget('site_settings_all'));
    }
}

