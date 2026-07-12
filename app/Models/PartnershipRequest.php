<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnershipRequest extends Model
{
    protected $fillable = [
        'organization_name',
        'contact_name',
        'email',
        'phone',
        'industry',
        'country',
        'csr_interest',
        'budget',
        'message',
        'status',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'budget' => 'decimal:2',
        ];
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeStatus($query, string $status)
    {
        return $query->where('status', $status);
    }
}
