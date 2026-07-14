<?php

namespace App\Models;

use App\Models\Concerns\HasPublicImageUrls;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasPublicImageUrls;

    protected $fillable = [
        'full_name',
        'position',
        'photo',
        'bio',
        'linkedin',
        'facebook',
        'twitter',
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

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order');
    }

    public function getPhotoUrlAttribute(): ?string
    {
        return $this->publicImageUrl($this->photo);
    }
}
