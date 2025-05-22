<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function employee()
    {
        return view('pages.employee');
    }

    public function store(StoreEmployeeRequest $request)
    {
        $validated = $request->validated();
        Employee::create($validated);
        return redirect()->back()->with('success', 'Employee created successfully.');
    }
}
