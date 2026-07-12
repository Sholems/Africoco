<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'pillar_id',
        'title',
        'slug',
        'short_description',
        'full_description',
        'featured_image',
        'icon',
        'focus_area',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function pillar()
    {
        return $this->belongsTo(Pillar::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('title');
    }
}
