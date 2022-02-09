@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('villages.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.villages.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.villages.inputs.name')</h5>
                    <span>{{ $village->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.villages.inputs.city')</h5>
                    <span>{{ $village->city->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.villages.inputs.state')</h5>
                    <span>{{ $village->state->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.villages.inputs.country')</h5>
                    <span>{{ $village->country->name ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('villages.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Kootam::class)
                <a href="{{ route('villages.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
