<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nid',
        'phone',
        'address',
        'photo',
        'somitee_id',
        'day_id',
    ];

    public function somitee()
    {
        return $this->belongsTo(Somitee::class);
    }

    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function insurances()
    {
        return $this->hasMany(Insurance::class);
    }
}