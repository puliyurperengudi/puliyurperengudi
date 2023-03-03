<?php

namespace App\DataTables;

use App\Models\TaxPayers;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PendingPayTaxReportDatatable extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function ajax()
    {
        if (!$this->request()->get('tax_list_id')) {
            return datatables()->collection(collect([]))->make(true);
        }

        return datatables()
            ->eloquent($this->query())
            ->addColumn('temple_user', function ($taxPayer) {
                return $taxPayer->templeUser->name;
            })
            ->addColumn('user_id', function ($taxPayer) {
                return $taxPayer->templeUser->userId();
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
            })
            ->addColumn('pending_amount', function ($taxPayer) {
                return $taxPayer->taxList->amount - $taxPayer->total_paid_amount;
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
        $templeUserId = request()->get('temple_user_id');
        $taxListId = request()->get('tax_list_id');
        $countryId = request()->get('country_id');
        $stateId = request()->get('state_id');
        $cityId = request()->get('city_id');
        $villageId = request()->get('village_id');
        $query = TaxPayers::with('taxList', 'templeUser', 'templeUser.country', 'templeUser.state', 'templeUser.city', 'templeUser.village')
            ->whereHas('templeUser', function ($query) use ($villageId, $cityId, $stateId, $countryId) {
                $query->when(($countryId && $countryId != ''), function ($query) use ($countryId) {
                        return $query->where('country_id', $countryId);
                    })
                    ->when(($stateId && $stateId != ''), function ($query) use ($stateId) {
                        return $query->where('state_id', $stateId);
                    })
                    ->when(($cityId && $cityId != ''), function ($query) use ($cityId) {
                        return $query->where('city_id', $cityId);
                    })
                    ->when(($villageId && $villageId != ''), function ($query) use ($villageId) {
                        return $query->where('village_id', $villageId);
                    });
            })
            ->when(($templeUserId && $templeUserId != ''), function ($query) use ($templeUserId) {
                return $query->where('temple_user_id', $templeUserId);
            })
            ->when(($taxListId && $taxListId != ''), function ($query) use ($taxListId) {
                return $query->where('tax_list_id', $taxListId);
            })
            ->groupBy('temple_user_id', 'tax_list_id')
            ->selectRaw(
        'temple_user_id, tax_list_id, SUM(paid_amount) as total_paid_amount'
        );
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
            Column::make('user_id'),
            Column::make('village_name'),
            Column::make('city_name'),
            Column::make('state_name'),
            Column::make('country_name'),
            Column::make('tax_list'),
            Column::make('paid_amount'),
            Column::make('pending_amount'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'PendingPayTaxReport_' . date('YmdHis');
    }
}
