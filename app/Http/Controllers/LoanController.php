<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoanRequest;
use App\Models\Loan;
use App\Models\Member;
use App\Models\Somitee;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function loan()
    {
        $loans = Loan::with(['somitee', 'member'])->orderBy('id', 'desc')->get();
        $somitees = Somitee::orderBy('name')->get();
        $members = Member::orderBy('name')->get();

        return view('pages.loan', compact('loans', 'somitees', 'members'));
    }

    public function store(LoanRequest $request)
    {
        $data = $request->validated();

        Loan::create($data);

        return redirect()->back()->with('success', 'Loan added successfully.');
    }
}
