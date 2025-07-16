<?php

namespace App\Http\Controllers;

use App\Models\Insurance;
use App\Models\Member;
use App\Models\Somitee;
use App\Http\Requests\StoreInsuranceRequest;
use App\Http\Requests\UpdateInsuranceRequest;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $insurances = Insurance::all();
        return view('insurances.index', compact('insurances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $members = Member::all();
        $somitees = Somitee::all();
        return view('insurances.create', compact('members', 'somitees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInsuranceRequest $request)
    {
        Insurance::create($request->validated());
        return redirect()->route('insurances.index')->with('success', 'Insurance created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Insurance $insurance)
    {
        return view('insurances.show', compact('insurance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Insurance $insurance)
    {
        $members = Member::all();
        $somitees = Somitee::all();
        return view('insurances.edit', compact('insurance', 'members', 'somitees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInsuranceRequest $request, Insurance $insurance)
    {
        $insurance->update($request->validated());
        return redirect()->route('insurances.index')->with('success', 'Insurance updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Insurance $insurance)
    {
        $insurance->delete();
        return redirect()->route('insurances.index')->with('success', 'Insurance deleted successfully.');
    }
}