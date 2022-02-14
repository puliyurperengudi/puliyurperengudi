<?php

namespace App\DataTables;

use App\Models\Donation;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DonationReportDatatable extends DataTable
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
            ->make(true);
    }

    /**
     * Get query source of dataTable.
     *
     * @return Builder
     */
    public function query()
    {
        // filters => taxlist id , temple id, date filter & others
        return $this->applyScopes(Donation::with(['taxList', 'kootam', 'vagera', 'caste', 'templeUser']));
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('donationreportdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1);
//                    ->buttons(
//                        Button::make('create'),
//                        Button::make('export'),
//                        Button::make('print'),
//                        Button::make('reset'),
//                        Button::make('reload')
//                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('id'),
            Column::make('receipt_no'),
            Column::make('last_paid_amount'),
            Column::make('created_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'DonationReport_' . date('YmdHis');
    }
}
