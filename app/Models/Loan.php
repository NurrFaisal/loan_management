<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'somitee_id',
        'member_id',
        'day_id',
        'loan_amount',
        'interest',
        'total_loan',
        'type',
        'installment',
        'installment_amount',

    ];

    public function somitee()
    {
        return $this->belongsTo(Somitee::class, 'somitee_id');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

}
