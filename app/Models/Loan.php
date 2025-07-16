<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'somitee_id',
        'loan_amount',
        'loan_purpose',
        'status',
        'day_id',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function somitee()
    {
        return $this->belongsTo(Somitee::class);
    }

    public function day()
    {
        return $this->belongsTo(Day::class);
    }
}