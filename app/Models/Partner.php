<?php

namespace App\Models;

use App\Models\Concerns\HasPublicImageUrls;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasPublicImageUrls;

    protected $fillable = [
        'organization_name',
        'logo',
        'website',
        'category',
        'description',
        'show_on_homepage',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'show_on_homepage' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeHomepage($query)
    {
        return $query->where('show_on_homepage', true);
    }

    public function getLogoUrlAttribute(): ?string
    {
        return $this->publicImageUrl($this->logo);
    }
}
