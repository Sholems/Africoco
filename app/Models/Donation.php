<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'donor_name',
        'email',
        'phone',
        'amount',
        'purpose',
        'message',
        'payment_reference',
        'transaction_id',
        'payment_status',
        'currency',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
        ];
    }

    public function scopeSuccessful($query)
    {
        return $query->where('payment_status', 'successful');
    }
}
