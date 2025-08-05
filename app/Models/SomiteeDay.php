<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SomiteeDay extends Model
{
    use HasFactory;

    protected $fillable = [
        'weekday',
        'collection_time',
        'is_active',
        'description'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'collection_time' => 'datetime:H:i'
    ];

    public function somitees()
    {
        return $this->hasMany(Somitee::class, 'somitee_day_id');
    }

    public static function getWeekdays()
    {
        return [
            'Monday' => 'Monday',
            'Tuesday' => 'Tuesday',
            'Wednesday' => 'Wednesday',
            'Thursday' => 'Thursday',
            'Friday' => 'Friday',
            'Saturday' => 'Saturday',
            'Sunday' => 'Sunday'
        ];
    }
}