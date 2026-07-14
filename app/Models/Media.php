<?php

namespace App\Models;

use App\Models\Concerns\HasPublicImageUrls;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasPublicImageUrls;

    protected $fillable = [
        'filename',
        'original_name',
        'alt_text',
        'mime_type',
        'file_size',
        'disk',
        'collection',
        'mediable_type',
        'mediable_id',
    ];

    protected function casts(): array
    {
        return [
            'file_size' => 'integer',
        ];
    }

    public function mediable()
    {
        return $this->morphTo();
    }

    /**
     * Get the full URL to the media file.
     */
    public function getUrlAttribute(): string
    {
        return $this->publicImageUrl($this->filename) ?? '';
    }

    /**
     * Get the human-readable file size.
     */
    public function getSizeForHumansAttribute(): string
    {
        $bytes = $this->file_size ?? 0;
        $units = ['B', 'KB', 'MB', 'GB'];

        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . ($units[$i] ?? 'B');
    }

    /**
     * Scope to filter by collection/directory.
     */
    public function scopeCollection($query, string $collection)
    {
        return $query->where('collection', $collection);
    }

    /**
     * Scope for image files only.
     */
    public function scopeImages($query)
    {
        return $query->whereIn('mime_type', [
            'image/jpeg',
            'image/png',
            'image/webp',
            'image/gif',
            'image/svg+xml',
        ]);
    }
}
