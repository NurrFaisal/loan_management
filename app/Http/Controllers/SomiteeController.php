<?php

namespace App\Http\Controllers;

use App\Models\Somitee;
use App\Models\Employee;
use App\Models\Branch;
use App\Models\Day;
use App\Http\Requests\StoreSomiteeRequest;
use App\Http\Requests\UpdateSomiteeRequest;
use Illuminate\Http\Request;

class SomiteeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $somitees = Somitee::all();
        return view('somitees.index', compact('somitees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        $branches = Branch::all();
        $days = Day::all();
        return view('somitees.create', compact('employees', 'branches', 'days'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSomiteeRequest $request)
    {
        Somitee::create($request->validated());
        return redirect()->route('somitees.index')->with('success', 'Somitee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Somitee $somitee)
    {
        return view('somitees.show', compact('somitee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Somitee $somitee)
    {
        $employees = Employee::all();
        $branches = Branch::all();
        $days = Day::all();
        return view('somitees.edit', compact('somitee', 'employees', 'branches', 'days'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSomiteeRequest $request, Somitee $somitee)
    {
        $somitee->update($request->validated());
        return redirect()->route('somitees.index')->with('success', 'Somitee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Somitee $somitee)
    {
        $somitee->delete();
        return redirect()->route('somitees.index')->with('success', 'Somitee deleted successfully.');
    }
}