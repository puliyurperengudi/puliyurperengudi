@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('expenses.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.expenses.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.expenses.inputs.tax_list_id')</h5>
                    <span>{{ optional($expense->taxList)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.expenses.inputs.expense_type_id')</h5>
                    <span
                        >{{ optional($expense->expenseType)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.expenses.inputs.name')</h5>
                    <span>{{ $expense->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.expenses.inputs.expense_date')</h5>
                    <span>{{ $expense->expense_date ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.expenses.inputs.paid_to')</h5>
                    <span>{{ $expense->paid_to ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.expenses.inputs.bill_no')</h5>
                    <span>{{ $expense->bill_no ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.expenses.inputs.amount')</h5>
                    <span>{{ $expense->amount ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('expenses.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Expense::class)
                <a href="{{ route('expenses.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
