<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function employee()
    {
        $employees = Employee::orderBy('id', 'desc')->get();
        return view('pages.employee', compact('employees'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        $validated = $request->validated();
        Employee::create($validated);
        return redirect()->back()->with('success', 'Employee created successfully.');
    }
}
