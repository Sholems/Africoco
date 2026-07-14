<?php

namespace App\Models;

use App\Models\Concerns\HasPublicImageUrls;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasPublicImageUrls;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'venue',
        'start_date',
        'end_date',
        'start_time',
        'banner',
        'registration_enabled',
        'registration_fee',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
            'start_time' => 'datetime',
            'registration_enabled' => 'boolean',
            'registration_fee' => 'decimal:2',
        ];
    }

    public function registrations()
    {
        return $this->hasMany(EventRegistration::class);
    }

    public function scopeUpcoming($query)
    {
        return $query->where('status', 'upcoming')->orWhere('status', 'ongoing');
    }

    public function getBannerUrlAttribute(): ?string
    {
        return $this->publicImageUrl($this->banner);
    }
}
