<?php

namespace App\Models;

use App\Models\Concerns\HasPublicImageUrls;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasPublicImageUrls;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'objectives',
        'budget',
        'amount_raised',
        'funding_required',
        'start_date',
        'end_date',
        'status',
        'progress',
        'is_featured',
        'featured_image',
        'gallery',
        'pillar_id',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'budget' => 'decimal:2',
            'amount_raised' => 'decimal:2',
            'funding_required' => 'decimal:2',
            'start_date' => 'date',
            'end_date' => 'date',
            'progress' => 'integer',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'gallery' => 'array',
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

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function getFundingProgressAttribute(): float
    {
        if (!$this->budget || $this->budget <= 0) return 0;
        return min(100, round(($this->amount_raised / $this->budget) * 100));
    }

    public function getExcerptAttribute($length = 150): string
    {
        return Str::limit(strip_tags($this->description ?? ''), $length);
    }

    public function getFeaturedImageUrlAttribute(): ?string
    {
        return $this->publicImageUrl($this->featured_image);
    }

    public function getGalleryImageUrlsAttribute(): array
    {
        return collect($this->gallery ?? [])
            ->map(fn ($path) => $this->publicImageUrl($path))
            ->filter()
            ->values()
            ->all();
    }
}
