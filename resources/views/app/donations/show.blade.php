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
                    <span>{{ $donation->templeUser->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.donations.inputs.mobile_number')</h5>
                    <span>{{ $donation->templeUser->mobile_number ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.donations.inputs.father_name')</h5>
                    <span>{{ $donation->templeUser->father_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.donations.inputs.address')</h5>
                    <span>{{ $donation->templeUser->address ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.temple_users.inputs.village_id')</h5>
                    <span>{{ optional($donation->templeUser->village)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.temple_users.inputs.city_id')</h5>
                    <span>{{ optional($donation->templeUser->city)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.temple_users.inputs.state_id')</h5>
                    <span>{{ optional($donation->templeUser->state)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.temple_users.inputs.country_id')</h5>
                    <span>{{ optional($donation->templeUser->country)->name ?? '-' }}</span>
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
                    <h5>@lang('crud.donations.inputs.kootam_id')</h5>
                    <span>{{ optional($donation->kootam)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.donations.inputs.vagera_id')</h5>
                    <span>{{ optional($donation)->vagera ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.donations.inputs.caste_id')</h5>
                    <span>{{ optional($donation->caste)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.donations.inputs.remarks')</h5>
                    <span>{{ optional($donation)->remarks ?? '-' }}</span>
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
