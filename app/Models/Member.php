<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'father_name',
        'gender',
        'nid',
        'phone',
        'somitee_id',
        'day_id',
        'photo',
        'address',
        'admission_fee',
        'status',
    ];

    public function somitee()
    {
        return $this->belongsTo(Somitee::class, 'somitee_id');
    }
}
