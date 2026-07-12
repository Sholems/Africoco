<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    protected $fillable = [
        'page',
        'section_key',
        'title',
        'subtitle',
        'body',
        'image',
        'button_text',
        'button_link',
        'is_active',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopePage($query, $page)
    {
        return $query->where('page', $page);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
