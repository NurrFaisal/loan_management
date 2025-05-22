<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function employee()
    {
        return view('pages.employee');
    }

    public function store(StoreEmployeeRequest $request)
    {
        return $request;
    }
}
