<?php

namespace App\DataTables;

use App\Models\Donation;
use App\Models\TaxPayers;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PayTaxReportDatatable extends DataTable
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
            ->addColumn('temple_user', function ($taxPayer) {
                return $taxPayer->templeUser->name;
            })
            ->addColumn('tax_list', function ($taxPayer) {
                return $taxPayer->taxList->name;
            })
            ->addColumn('country_name', function ($taxPayer) {
                return $taxPayer->templeUser->country->name ?? '-';
            })
            ->addColumn('state_name', function ($taxPayer) {
                return $taxPayer->templeUser->state->name ?? '-';
            })
            ->addColumn('city_name', function ($taxPayer) {
                return $taxPayer->templeUser->city->name ?? '-';
            })
            ->addColumn('village_name', function ($taxPayer) {
                return $taxPayer->templeUser->village->name ?? '-';
            })
            ->addColumn('paid_amount', function ($taxPayer) {
                return $taxPayer->total_paid_amount;
//                return $taxPayer->total_paid_amount . '(' . $taxPayer->paid_amount_details .')';
            })
//            ->addColumn('paid_date', function ($taxPayer) {
//                return $taxPayer->paid_date_details;
//            })
//            ->addColumn('paid_to', function ($taxPayer) {
//                return $taxPayer->paid_to_details;
//            })
//            ->addColumn('receipt_no', function ($taxPayer) {
//                return $taxPayer->receipt_no_details;
//            })
            ->addColumn('action', function ($taxPayer) {
                return '<a href="#" onclick="openLinkInCurrentTab(\''. route('pay-tax-details.report', [$taxPayer->temple_user_id, $taxPayer->tax_list_id]) .'\')"><button type="button" class="btn btn-light"><i class="icon ion-md-eye"></i></button></a>';
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
        $templeUserId = request()->get('temple_user_id');
        $taxListId = request()->get('tax_list_id');
        $query = TaxPayers::with('taxList', 'templeUser', 'templeUser.country', 'templeUser.state', 'templeUser.city', 'templeUser.village')
            ->when(($fromDate && $fromDate != ''), function ($query) use ($fromDate) {
                return $query->where('created_at', '>', $fromDate);
            })
            ->when(($toDate && $toDate != ''), function ($query) use ($toDate) {
                return $query->where('created_at', '<', $toDate);
            })
            ->when(($templeUserId && $templeUserId != ''), function ($query) use ($templeUserId) {
                return $query->where('temple_user_id', $templeUserId);
            })
            ->when(($taxListId && $taxListId != ''), function ($query) use ($taxListId) {
                return $query->where('tax_list_id', $taxListId);
            })
            ->groupBy('temple_user_id', 'tax_list_id')
            ->selectRaw(
                'temple_user_id, tax_list_id, SUM(paid_amount) as total_paid_amount');
//        ->selectRaw(
//        'temple_user_id, tax_list_id, SUM(paid_amount) as total_paid_amount, GROUP_CONCAT(paid_amount) as paid_amount_details,
//                GROUP_CONCAT(paid_date) as paid_date_details, GROUP_CONCAT(paid_to) as paid_to_details, GROUP_CONCAT(receipt_no) as receipt_no_details'
//    );
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
            Column::make('temple_user'),
            Column::make('village_name'),
            Column::make('city_name'),
            Column::make('state_name'),
            Column::make('country_name'),
            Column::make('tax_list'),
            Column::make('paid_amount'),
//            Column::make('paid_date'),
//            Column::make('paid_to'),
//            Column::make('receipt_no'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'PayTaxReport_' . date('YmdHis');
    }
}
