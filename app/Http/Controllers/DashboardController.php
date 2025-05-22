<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.index');
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
