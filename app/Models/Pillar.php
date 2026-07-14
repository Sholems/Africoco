<?php

namespace App\Models;

use App\Models\Concerns\HasPublicImageUrls;
use Illuminate\Database\Eloquent\Model;

class Pillar extends Model
{
    use HasPublicImageUrls;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'color',
        'banner',
        'display_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'display_order' => 'integer',
        ];
    }

    public function programs()
    {
        return $this->hasMany(Program::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order');
    }

    public function getBannerUrlAttribute(): ?string
    {
        return $this->publicImageUrl($this->banner);
    }
}
