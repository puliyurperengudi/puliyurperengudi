<?php

namespace App\DataTables;

use App\Models\Donation;
use Carbon\Carbon;
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
            ->addColumn('paid_at', function ($donation) {
                return $donation->created_at->format(DATE_FORMAT);
            })
            ->addColumn('tax_list', function ($donation) {
                return $donation->taxList->name;
            })
            ->addColumn('name', function ($donation) {
                return $donation->templeUser->name;
            })
            ->addColumn('user_id', function ($donation) {
                return $donation->templeUser->userId();
            })
            ->addColumn('mobile_number', function ($donation) {
                return $donation->templeUser->mobile_number;
            })
            ->addColumn('father_name', function ($donation) {
                return $donation->templeUser->father_name;
            })
            ->addColumn('address', function ($donation) {
                return $donation->templeUser->address;
            })
            ->addColumn('kootam', function ($donation) {
                return $donation->kootam->name;
            })
            ->addColumn('caste', function ($donation) {
                return $donation->caste->name;
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
        $countryId = request()->get('country_id');
        $stateId = request()->get('state_id');
        $cityId = request()->get('city_id');
        $villageId = request()->get('village_id');
        $query = Donation::with('taxList', 'templeUser', 'kootam', 'caste')
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
            ->when(($fromDate && $fromDate != ''), function ($query) use ($fromDate) {
                return $query->where('created_at', '>=', Carbon::parse($fromDate)->startOfDay());
            })
            ->when(($toDate && $toDate != ''), function ($query) use ($toDate) {
                return $query->where('created_at', '<=', Carbon::parse($toDate)->endOfDay());
            })
            ->when(($templeUserId && $templeUserId != ''), function ($query) use ($templeUserId) {
                return $query->where('temple_user_id', $templeUserId);
            })
            ->when(($taxListId && $taxListId != ''), function ($query) use ($taxListId) {
                return $query->where('tax_list_id', $taxListId);
            });
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
            Column::make('tax_list'),
            Column::make('name'),
            Column::make('user_id'),
            Column::make('mobile_number'),
            Column::make('father_name'),
            Column::make('address'),
            Column::make('receipt_no'),
            Column::make('last_paid_amount'),
            Column::make('kootam'),
            Column::make('vagera'),
            Column::make('caste'),
            Column::make('paid_at'),
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
