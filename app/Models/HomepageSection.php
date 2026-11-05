<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageSection extends Model
{
    protected $fillable = [
        'section_key',
        'title',
        'subtitle',
        'description',
        'content',
        'is_enabled',
        'sort_order',
    ];

    protected $casts = [
        'content' => 'array',
        'is_enabled' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopeEnabled($query)
    {
        return $query->where('is_enabled', true);
    }

    public static function getByKey(string $key): ?static
    {
        return static::where('section_key', $key)->first();
    }
}
