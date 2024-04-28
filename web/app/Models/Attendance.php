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

    // return all attendance for the current month of the user, day by day (1-31).
    // This is useful for generating a calendar view of the user's attendance
    // each day will have a status of 'present', 'absent', 'late', 'early', or 'on time'.
    public function scopeMonthly($query)
    {
        return $query->whereMonth('date', now()->month)
            ->whereYear('date', now()->year)
            ->get()
            ->groupBy(fn ($attendance) => $attendance->date->day)
            ->map(fn ($day) => $day->first()->status);
    }

    // return all absent days for until the current day of the user.
    // The days will be returned as an array of integers (1-31) representing the days of the month
    // the records might be non existent for some days, in which case the day is considered absent
    public function scopeAbsentDays($query)
    {
        $existingDays = $query->pluck('date')->map(function ($date) {
            return $date->format('j');
        })->toArray();

        return collect(range(1, now()->day))
            ->reject(function ($day) use ($existingDays) {
                return in_array($day, $existingDays);
            })->toArray();
    }

    // scope present days
    public function scopePresentDays($query)
    {
        $existingDays = $query->pluck('date')->map(function ($date) {
            return $date->format('j');
        })->toArray();

        return collect(range(1, now()->day))
            ->filter(function ($day) use ($existingDays) {
                return in_array($day, $existingDays);
            })->toArray();
    }
}
