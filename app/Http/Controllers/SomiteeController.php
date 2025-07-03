<?php

namespace App\Http\Controllers;

use App\Http\Requests\SomiteeRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Branch;
use App\Models\Employee;
use App\Models\Somitee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SomiteeController extends Controller
{

    public function index()
    {
        $employees = Employee::get();
        $somitees = Somitee::get();
        $branches = Branch::orderBy('name', 'asc')->get();
        return view('pages.somitee', [
            'branches' => $branches,
            'employees' => $employees,
            'somitees' => $somitees,
        ]);
    }

    public function store(SomiteeRequest $request)
    {
        try {
            Somitee::create([
                'name'        => $request->name,
                'employee_id' => $request->employee_id,
                'branch_id'   => $request->branch_id,
                'day_id'      => 1,
                'somitee_day' => $request->somitee_day,
                'date'        => Carbon::createFromFormat('m/d/Y', $request->date)->format('Y-m-d'),
                'description' => $request->description,
            ]);

            return redirect()->back()->with('success', 'Somitee created successfully!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}
