<?php

namespace App\Models;

use App\Models\Concerns\HasPublicImageUrls;
use Illuminate\Database\Eloquent\Model;

class AnnualReport extends Model
{
    use HasPublicImageUrls;

    protected $fillable = [
        'title',
        'type',
        'year',
        'description',
        'file_path',
        'cover_image',
        'is_featured',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'year' => 'integer',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOfType($query, string $type)
    {
        return $query->where('type', $type);
    }

    public function getCoverImageUrlAttribute(): ?string
    {
        return $this->publicImageUrl($this->cover_image);
    }

    public function getFileUrlAttribute(): ?string
    {
        return $this->publicImageUrl($this->file_path);
    }
}
