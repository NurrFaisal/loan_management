<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function somitees()
    {
        return $this->hasMany(Somitee::class);
    }

    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}