<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;
use App\Models\Member;
use App\Models\Somitee;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    public function member()
    {
        $members = Member::with('somitee')->orderBy('id', 'desc')->get();
        $somitees = Somitee::orderBy('name')->get();

        return view('pages.member', compact('members', 'somitees'));
    }


    public function store(MemberRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('members', 'public');
            $data['photo'] = $photoPath;
        }

        Member::create($data);

        return redirect()->back()->with('success', 'Member added successfully.');
    }
}
