<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Loan;
use App\Models\Member;
use App\Models\Day;
use App\Models\Holiday;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $employeeCount = Employee::count();
        $loanCount = Loan::count();
        $memberCount = Member::count();
        $overdueLoanCount = Loan::where('status', 'overdue')->count(); // Assuming a 'overdue' status

        return view('dashboard', compact('employeeCount', 'loanCount', 'memberCount', 'overdueLoanCount'));
    }

    public function dayEnd()
    {
        $lastDay = Day::orderBy('id', 'desc')->first();
        $currentDate = $lastDay ? Carbon::parse($lastDay->name) : Carbon::today();

        $nextDay = $currentDate->addDay();

        while ($nextDay->isFriday() || Holiday::where('date', $nextDay->format('Y-m-d'))->exists()) {
            $nextDay->addDay();
        }

        Day::create(['name' => $nextDay->format('Y-m-d')]);

        return redirect()->route('dashboard')->with('success', 'Day ended successfully and new day added.');
    }

    public function somitee()
    {
        return view('pages.somitee');
    }

    public function member()
    {
        return view('pages.member');
    }

    public function loan()
    {
        return view('pages.loan');
    }

    public function cashbook()
    {
        return view('pages.cashbook');
    }

    public function dueCollection()
    {
        return view('pages.dueCollection');
    }

    public function voucher()
    {
        return view('pages.voucher');
    }
}
