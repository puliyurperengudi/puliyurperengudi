@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('tax-lists.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.tax_lists.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.tax_lists.inputs.name')</h5>
                    <span>{{ $taxList->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.tax_lists.inputs.amount')</h5>
                    <span>{{ $taxList->amount ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('tax-lists.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\TaxList::class)
                <a href="{{ route('tax-lists.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
