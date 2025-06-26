<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Branch;
use App\Models\Somitee;
use Illuminate\Http\Request;

class SomiteeController extends Controller
{

    public function index()
    {
        $branches = Branch::orderBy('name', 'asc')->get();
        return view('pages.somitee', ['branches' => $branches]);
    }

    public function store(StoreEmployeeRequest $request)
    {
        $validated = $request->validated();
        Somitee::create($validated);
        return redirect()->back()->with('success', 'Employee created successfully.');
    }
}
