<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'father_husband_name',
        'gender',
        'nid',
        'phone',
        'somitee_id',
        'photo',
        'status',
        'address',
        'admission_fee',
    ];

    public function somitee()
    {
        return $this->belongsTo(Somitee::class);
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