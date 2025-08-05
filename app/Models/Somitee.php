<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Somitee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'employee_id',
        'branch_id',
        'day_id',
        'somitee_day_id',
        'description',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function insurances()
    {
        return $this->hasMany(Insurance::class);
    }

    public function somiteeDay()
    {
        return $this->belongsTo(SomiteeDay::class, 'somitee_day_id');
    }
}