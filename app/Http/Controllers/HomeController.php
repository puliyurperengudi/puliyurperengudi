<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Expense;
use App\Models\TaxList;
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
        $taxListFilter = request('tax-list');
        $taxLists = TaxList::latest()->get();
        if ($taxListFilter == 'ALL') {
            $taxListId = null;
        } else {
            if (is_numeric($taxListFilter)) {
                $taxListId = $taxLists->where('id', $taxListFilter)->first()->id ?? null;
            } else {
                $taxListId = $taxLists->first()->id ?? null;
            }
        }
        $totalTax = TaxPayers::when($taxListId, function ($query) use ($taxListId) {
            return $query->where('tax_list_id', $taxListId);
        })->sum('paid_amount');
        $totalDonation = Donation::when($taxListId, function ($query) use ($taxListId) {
            return $query->where('tax_list_id', $taxListId);
        })->sum('last_paid_amount');
        $totalExpense = Expense::when($taxListId, function ($query) use ($taxListId) {
            return $query->where('tax_list_id', $taxListId);
        })->sum('amount');
        return view('home', compact('totalTax', 'totalDonation', 'totalExpense', 'taxListId', 'taxLists'));
    }
}
