<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'somitee_id',
        'insurance_amount',
        'status',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function somitee()
    {
        return $this->belongsTo(Somitee::class);
    }
}