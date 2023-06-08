<?php

namespace App\DataTables;

use App\Models\Donation;
use App\Models\Expense;
use App\Models\TaxPayers;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class LedgerReportDatatable extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function ajax()
    {
        return datatables()
            ->collection($this->getData())
            ->addColumn('tax_list_name', function ($report) {
                return optional($report->taxList)->name ?? '-';
            })
            ->addColumn('paid_date', function ($report) {
                return $report->paid_date ? Carbon::parse($report->paid_date)->format(DATE_FORMAT) : '-';
            })
            ->addColumn('report_type', function ($report) {
                return $report->report_type;
            })
            ->addColumn('receipt_number', function ($report) {
                return $report->receipt_number;
            })
            ->make(true);
    }

    public function getData()
    {
        $fromDate = request()->get('from_date');
        $toDate = request()->get('to_date');
        $taxListId = request()->get('tax_list_id');
        $reportType = request()->get('report_type');

        $donationReport = $payTaxReport = $expenseReport = [];
        if ($reportType == ALL_REPORTS || $reportType == DONATION_REPORT) {
            $donationReport = $this->getDonationReportData($fromDate, $toDate, $taxListId);
        }
        if ($reportType == ALL_REPORTS || $reportType == PAY_TAX_REPORT) {
            $payTaxReport = $this->getPayTaxReportData($fromDate, $toDate, $taxListId);
        }
        if ($reportType == ALL_REPORTS || $reportType == EXPENSE_REPORT) {
            $expenseReport = $this->getExpenseReportData($fromDate, $toDate, $taxListId);
        }

        return (collect($donationReport)->merge(collect($payTaxReport))->merge(collect($expenseReport)))->sortBy('paid_date');
    }

    public function getDonationReportData($fromDate, $toDate, $taxListId)
    {
        return Donation::with('taxList')->whereHas('templeUser')
            ->when(($fromDate && $fromDate != ''), function ($query) use ($fromDate) {
                return $query->where('created_at', '>=', Carbon::parse($fromDate)->startOfDay());
            })
            ->when(($toDate && $toDate != ''), function ($query) use ($toDate) {
                return $query->where('created_at', '<=', Carbon::parse($toDate)->endOfDay());
            })
            ->when(($taxListId && $taxListId != ''), function ($query) use ($taxListId) {
                return $query->where('tax_list_id', $taxListId);
            })
            ->selectRaw('created_at as paid_date, receipt_no as receipt_number, tax_list_id, "' . DONATION_REPORT . '" as report_type, last_paid_amount as amount')
            ->get();
    }

    public function getPayTaxReportData($fromDate, $toDate, $taxListId)
    {
        return TaxPayers::with('taxList')->whereHas('templeUser')
            ->when(($fromDate && $fromDate != ''), function ($query) use ($fromDate) {
                return $query->where('created_at', '>=', Carbon::parse($fromDate)->startOfDay());
            })
            ->when(($toDate && $toDate != ''), function ($query) use ($toDate) {
                return $query->where('created_at', '<=', Carbon::parse($toDate)->endOfDay());
            })
            ->when(($taxListId && $taxListId != ''), function ($query) use ($taxListId) {
                return $query->where('tax_list_id', $taxListId);
            })
            ->selectRaw('tax_list_id, paid_amount as amount, paid_date, receipt_no as receipt_number, "' . PAY_TAX_REPORT . '" as report_type')
            ->get();
    }

    public function getExpenseReportData($fromDate, $toDate, $taxListId)
    {
        return Expense::with('taxList')
            ->when(($fromDate && $fromDate != ''), function ($query) use ($fromDate) {
                return $query->where('created_at', '>=', Carbon::parse($fromDate)->startOfDay());
            })
            ->when(($toDate && $toDate != ''), function ($query) use ($toDate) {
                return $query->where('created_at', '<=', Carbon::parse($toDate)->endOfDay());
            })
            ->when(($taxListId && $taxListId != ''), function ($query) use ($taxListId) {
                return $query->where('tax_list_id', $taxListId);
            })
            ->selectRaw('tax_list_id, amount, expense_date as paid_date, bill_no as receipt_number, "' . EXPENSE_REPORT . '" as report_type')
            ->get();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('dataTableBuilder')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->buttons(
                        Button::make('copy'),
                        Button::make('print'),
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('reload'),
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('tax_list_name'),
            Column::make('report_type'),
            Column::make('paid_date'),
            Column::make('receipt_number')->name('Receipt/Bill Number'),
            Column::make('amount'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'LedgerReport_' . date('YmdHis');
    }
}
