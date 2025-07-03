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
        'somitee_day',
        'date',
        'description'
    ];
}
