@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('donations.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.donations.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.donations.inputs.tax_list_id')</h5>
                    <span>{{ optional($donation->taxList)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.donations.inputs.name')</h5>
                    <span>{{ $donation->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.donations.inputs.mobile_number')</h5>
                    <span>{{ $donation->mobile_number ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.donations.inputs.father_name')</h5>
                    <span>{{ $donation->father_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.donations.inputs.address')</h5>
                    <span>{{ $donation->address ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.donations.inputs.receipt_no')</h5>
                    <span>{{ $donation->receipt_no ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.donations.inputs.last_paid_amount')</h5>
                    <span>{{ $donation->last_paid_amount ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.donations.inputs.last_paid_to')</h5>
                    <span>{{ $donation->last_paid_to ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.donations.inputs.kootam_id')</h5>
                    <span>{{ optional($donation->kootam)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.donations.inputs.vagera_id')</h5>
                    <span>{{ optional($donation->vagera)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.donations.inputs.caste_id')</h5>
                    <span>{{ optional($donation->caste)->name ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('donations.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Donation::class)
                <a href="{{ route('donations.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
