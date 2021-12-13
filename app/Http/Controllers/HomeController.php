<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Expense;
use App\Models\TaxPayers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalTax = TaxPayers::sum('paid_amount');
        $totalDonation = Donation::sum('last_paid_amount');
        $totalExpense = Expense::sum('amount');
        return view('home', compact('totalTax', 'totalDonation', 'totalExpense'));
    }
}
