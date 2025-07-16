<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'manager_id',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function somitees()
    {
        return $this->hasMany(Somitee::class);
    }
}