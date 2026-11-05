<?php

use App\Models\Setting;

if (! function_exists('setting')) {
    /**
     * Get or set a website setting.
     */
    function setting(?string $key = null, mixed $default = null): mixed
    {
        if (is_null($key)) {
            return app(Setting::class);
        }

        return Setting::get($key, $default);
    }
}

