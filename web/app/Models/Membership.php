<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plan',
        'status',
        'trial_ends_at',
        'ends_at',
        'canceled_at',
        'payment_gateway',
        'payment_id',
        'payment_status',
        'amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeInactive($query)
    {
        return $query->where('status', 'inactive');
    }

    public function scopeTrial($query)
    {
        return $query->where('status', 'trial');
    }

    public function scopeCanceled($query)
    {
        return $query->where('status', 'canceled');
    }

    public function scopeExpired($query)
    {
        return $query->where('status', 'expired');
    }

    public function scopeEndingSoon($query)
    {
        return $query->where('ends_at', '<', now()->addDays(7));
    }

    public function scopeEndingToday($query)
    {
        return $query->where('ends_at', now()->toDateString());
    }

    public function scopeEndingTomorrow($query)
    {
        return $query->where('ends_at', now()->addDay()->toDateString());
    }

    public function scopeEndingThisWeek($query)
    {
        return $query->whereBetween('ends_at', [now()->startOfWeek(), now()->endOfWeek()]);
    }

    public function scopeEndingNextWeek($query)
    {
        return $query->whereBetween('ends_at', [now()->addWeek()->startOfWeek(), now()->addWeek()->endOfWeek()]);
    }
}
