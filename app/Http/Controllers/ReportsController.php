<?php

namespace App\Http\Controllers;

use App\DataTables\DonationReportDatatable;

class ReportsController extends Controller
{
    public function getDonationReport(DonationReportDatatable $donationReportDatatable)
    {
        return $donationReportDatatable->render('app.reports.donation');
    }
}
