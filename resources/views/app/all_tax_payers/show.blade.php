@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('all-tax-payers.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.all_tax_payers.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>User Id</h5>
                    <span
                        >{{ optional($taxPayers->templeUser)->userId() ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_tax_payers.inputs.temple_user_id')</h5>
                    <span
                        >{{ optional($taxPayers->templeUser)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_tax_payers.inputs.tax_list_id')</h5>
                    <span
                        >{{ optional($taxPayers->taxList)->name ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_tax_payers.inputs.paid_amount')</h5>
                    <span>{{ $taxPayers->paid_amount ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_tax_payers.inputs.paid_date')</h5>
                    <span>{{ $taxPayers->paid_date->format(DATE_FORMAT) ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_tax_payers.inputs.paid_to')</h5>
                    <span>{{ $taxPayers->paid_to ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_tax_payers.inputs.receipt_no')</h5>
                    <span>{{ $taxPayers->receipt_no ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('all-tax-payers.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\TaxPayers::class)
                <a
                    href="{{ route('all-tax-payers.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
