<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'status',
        'check_in',
        'check_out',
        'note',
    ];

    protected $casts = [
        'check_in' => 'datetime',
        'check_out' => 'datetime',
        'date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeToday($query)
    {
        return $query->where('date', now()->toDateString());
    }

    public function scopeCheckIn($query)
    {
        return $query->whereNotNull('check_in')->whereNull('check_out');
    }

    public function scopeCheckOut($query)
    {
        return $query->whereNotNull('check_in')->whereNotNull('check_out');
    }

    public function scopeAbsent($query)
    {
        return $query->whereNull('check_in');
    }

    public function scopeLate($query)
    {
        return $query->where('check_in', '>', now()->setTime(8, 0, 0)->toDateTimeString());
    }

    public function scopeEarly($query)
    {
        return $query->where('check_out', '<', now()->setTime(17, 0, 0)->toDateTimeString());
    }

    public function scopeOnTime($query)
    {
        return $query->where('check_in', '<', now()->setTime(8, 0, 0)->toDateTimeString());
    }
}
