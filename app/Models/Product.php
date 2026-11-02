<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'features' => 'array',
        'certifications' => 'array',
        'color_options' => 'array',
        'gallery_images' => 'array',
        'is_featured' => 'boolean',
        'is_sustainable' => 'boolean',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByCategory($query, ?string $category)
    {
        if (empty($category) || $category === 'all') {
            return $query;
        }

        return $query->where('category', $category);
    }

    public function scopeSearch($query, ?string $term)
    {
        if (empty($term)) {
            return $query;
        }

        $term = trim($term);

        return $query->where(function ($q) use ($term) {
            $q->where('title', 'like', "%{$term}%")
                ->orWhere('summary', 'like', "%{$term}%")
                ->orWhere('primary_material', 'like', "%{$term}%")
                ->orWhere('category_name', 'like', "%{$term}%")
                ->orWhere('sku', 'like', "%{$term}%");
        });
    }
}
