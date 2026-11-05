<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = [
        'name',
        'company',
        'email',
        'category',
        'volume',
        'body',
        'status',
        'admin_notes',
        'ip_address',
    ];

    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    public function isNew(): bool
    {
        return $this->status === 'new';
    }
}

