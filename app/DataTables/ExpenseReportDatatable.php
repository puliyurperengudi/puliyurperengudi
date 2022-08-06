<?php

namespace App\DataTables;

use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ExpenseReportDatatable extends DataTable
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
            ->eloquent($this->query())
            ->addColumn('tax_list_name', function ($expense) {
                return optional($expense->taxList)->name ?? '-';
            })
            ->addColumn('expense_type_name', function ($expense) {
                return optional($expense->expenseType)->name ?? '-';
            })
            ->editColumn('name', function ($expense) {
                return $expense->name ?? '-';
            })
            ->editColumn('expense_date', function ($expense) {
                return $expense->expense_date->format(DATE_FORMAT) ?? '-';
            })
            ->editColumn('paid_to', function ($expense) {
                return $expense->paid_to ?? '-';
            })
            ->editColumn('bill_no', function ($expense) {
                return $expense->bill_no ?? '-';
            })
            ->editColumn('amount', function ($expense) {
                return $expense->amount ?? '-';
            })
            ->make(true);
    }

    /**
     * Get query source of dataTable.
     *
     * @return Builder
     */
    public function query()
    {
        $fromDate = request()->get('from_date');
        $toDate = request()->get('to_date');
        $taxListId = request()->get('tax_list_id');
        $expenseTypeId = request()->get('expense_type_id');
        $query = Expense::with('taxList', 'expenseType')
            ->when(($fromDate && $fromDate != ''), function ($query) use ($fromDate) {
                return $query->where('created_at', '>=', Carbon::parse($fromDate)->startOfDay());
            })
            ->when(($toDate && $toDate != ''), function ($query) use ($toDate) {
                return $query->where('created_at', '<=', Carbon::parse($toDate)->endOfDay());
            })
            ->when(($taxListId && $taxListId != ''), function ($query) use ($taxListId) {
                return $query->where('tax_list_id', $taxListId);
            })
            ->when(($expenseTypeId && $expenseTypeId != ''), function ($query) use ($expenseTypeId) {
                return $query->where('expense_type_id', $expenseTypeId);
            })->latest();
        return $this->applyScopes($query);
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
            Column::make('expense_type_name'),
            Column::make('name'),
            Column::make('expense_date'),
            Column::make('paid_to'),
            Column::make('bill_no'),
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
        return 'ExpenseReport_' . date('YmdHis');
    }
}
