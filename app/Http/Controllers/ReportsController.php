<?php

namespace App\Http\Controllers;

use App\DataTables\DonationReportDatatable;
use App\DataTables\ExpenseReportDatatable;
use App\DataTables\PayTaxReportDatatable;
use App\Models\Country;
use App\Models\ExpenseType;
use App\Models\TaxList;
use App\Models\TaxPayers;
use App\Models\TempleUser;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function getDonationReport(DonationReportDatatable $donationReportDatatable)
    {
        $templeUsers = TempleUser::all();
        $taxLists = TaxList::all();
        $countries = Country::pluck('name', 'id');
        return $donationReportDatatable->render('app.reports.donation', compact('taxLists', 'templeUsers', 'countries'));
    }

    public function getPayTaxReport(PayTaxReportDatatable $payTaxReportDatatable)
    {
        $templeUsers = TempleUser::all();
        $taxLists = TaxList::all();
        $countries = Country::pluck('name', 'id');
        return $payTaxReportDatatable->render('app.reports.pay_tax', compact('taxLists', 'templeUsers', 'countries'));
    }

    public function getPayTaxReportDetails(Request $request, $userId, $payTaxId)
    {
        $taxPayerDetails = TaxPayers::with('taxList', 'templeUser')->where('temple_user_id', $userId)->where('tax_list_id', $payTaxId)->oldest('paid_date')->get();
        return view('app.reports.pay_tax_details', compact('taxPayerDetails'));
    }

    public function getExpenseReport(ExpenseReportDatatable $expenseReportDatatable)
    {
        $taxLists = TaxList::all();
        $expenseTypes = ExpenseType::all();
        return $expenseReportDatatable->render('app.reports.expense', compact('taxLists', 'expenseTypes'));
    }
}
