<?php

namespace App\DataTables;

use App\Models\Donation;
use App\Models\TempleUser;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TempleUserReportDatatable extends DataTable
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
            ->addColumn('temple_user_id', function ($templeUser) {
                return $templeUser->userId();
            })
            ->addColumn('name', function ($templeUser) {
                return $templeUser->name ?? '-';
            })
            ->addColumn('mobile_number', function ($templeUser) {
                return $templeUser->mobile_number ?? '-';
            })
            ->addColumn('father_name', function ($templeUser) {
                return $templeUser->father_name ?? '-';
            })
            ->addColumn('address', function ($templeUser) {
                return $templeUser->address ?? '-';
            })
            ->addColumn('kootam_name', function ($templeUser) {
                return optional($templeUser->kootam)->name ?? '-';
            })
            ->addColumn('caste_name', function ($templeUser) {
                return optional($templeUser->caste)->name ?? '-';
            })
            ->addColumn('village_name', function ($templeUser) {
                return optional($templeUser->village)->name ?? '-';
            })
            ->addColumn('vagera', function ($templeUser) {
                return $templeUser->vagera ?? '-';
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
        $casteId = request()->get('caste_id');
        $kootamId = request()->get('kootam_id');
        $countryId = request()->get('country_id');
        $stateId = request()->get('state_id');
        $cityId = request()->get('city_id');
        $villageId = request()->get('village_id');
        $query = TempleUser::with('kootam', 'caste', 'village')
            ->when(($fromDate && $fromDate != ''), function ($query) use ($fromDate) {
                return $query->where('created_at', '>=', Carbon::parse($fromDate)->startOfDay());
            })
            ->when(($toDate && $toDate != ''), function ($query) use ($toDate) {
                return $query->where('created_at', '<=', Carbon::parse($toDate)->endOfDay());
            })
            ->when(($countryId && $countryId != ''), function ($query) use ($countryId) {
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
            })
            ->when(($casteId && $casteId != ''), function ($query) use ($casteId) {
                return $query->where('caste_id', $casteId);
            })
            ->when(($kootamId && $kootamId != ''), function ($query) use ($kootamId) {
                return $query->where('kootam_id', $kootamId);
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
            Column::make('temple_user_id'),
            Column::make('name'),
            Column::make('father_name'),
            Column::make('address'),
            Column::make('village_name'),
            Column::make('mobile_number'),
            Column::make('kootam_name'),
            Column::make('caste_name'),
            Column::make('vagera'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'TempleUserReport_' . date('YmdHis');
    }
}
