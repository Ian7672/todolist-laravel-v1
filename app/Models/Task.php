<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'deadline',
        'completed',
        'completed_at',
        'user_id'
    ];

    protected $casts = [
        'deadline' => 'date',
        'completed' => 'boolean',
        'completed_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Accessor untuk mendapatkan status text
    public function getStatusAttribute()
    {
        return $this->completed ? 'Selesai' : 'Belum Selesai';
    }

    // Accessor untuk mendapatkan tanggal selesai yang diformat
    public function getFormattedCompletedAtAttribute()
    {
        if ($this->completed_at) {
            return Carbon::parse($this->completed_at)->translatedFormat('d F Y, H:i');
        }
        return null;
    }


    protected static function boot()
    {
        parent::boot();

        static::updating(function ($task) {
            if ($task->isDirty('completed')) {
                if ($task->completed) {
                    $task->completed_at = now();
                } else {
                    $task->completed_at = null;
                }
            }
        });
    }
}
