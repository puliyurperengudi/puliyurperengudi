@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('temple-users.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.temple_users.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>User Id</h5>
                    <span>{{ $templeUser->userId() ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.temple_users.inputs.name')</h5>
                    <span>{{ $templeUser->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.temple_users.inputs.father_name')</h5>
                    <span>{{ $templeUser->father_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.temple_users.inputs.address')</h5>
                    <span>{{ $templeUser->address ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.temple_users.inputs.village_id')</h5>
                    <span>{{ optional($templeUser->village)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.temple_users.inputs.city_id')</h5>
                    <span>{{ optional($templeUser->city)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.temple_users.inputs.state_id')</h5>
                    <span>{{ optional($templeUser->state)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.temple_users.inputs.country_id')</h5>
                    <span>{{ optional($templeUser->country)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.temple_users.inputs.mobile_number')</h5>
                    <span>{{ $templeUser->mobile_number ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.temple_users.inputs.kootam_id')</h5>
                    <span
                        >{{ optional($templeUser->kootam)->name ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.temple_users.inputs.vagera')</h5>
                    <span
                        >{{ $templeUser->vagera ?: '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.temple_users.inputs.caste_id')</h5>
                    <span>{{ optional($templeUser->caste)->name ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('temple-users.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\TempleUser::class)
                <a
                    href="{{ route('temple-users.create') }}"
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
