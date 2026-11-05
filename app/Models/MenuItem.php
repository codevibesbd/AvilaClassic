<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = [
        'location',
        'label',
        'url',
        'target',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order', 'asc');
    }

    public function scopeHeader($query)
    {
        return $query->where('location', 'header')->active();
    }

    public function scopeFooterEnterprise($query)
    {
        return $query->where('location', 'footer_enterprise')->active();
    }

    public function scopeFooterDisciplines($query)
    {
        return $query->where('location', 'footer_disciplines')->active();
    }
}

