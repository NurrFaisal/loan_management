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
        'loan_amount',
        'interest',
        'total_payable',
        'loan_type',
        'installment',
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