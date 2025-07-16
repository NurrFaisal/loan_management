<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Loan;
use App\Models\Member;

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