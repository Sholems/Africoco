<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventRegistration extends Model
{
    protected $fillable = [
        'event_id',
        'full_name',
        'email',
        'phone',
        'organization',
        'ticket_type',
        'payment_reference',
        'amount',
        'payment_status',
        'registration_status',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
        ];
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
