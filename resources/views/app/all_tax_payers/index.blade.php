@extends('layouts.app')

@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <form>
                    <div class="input-group">
                        <input
                            id="indexSearch"
                            type="text"
                            name="search"
                            placeholder="{{ __('crud.common.search') }}"
                            value="{{ $search ?? '' }}"
                            class="form-control"
                            autocomplete="off"
                        />
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="icon ion-md-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\TaxPayers::class)
                <a
                    href="{{ route('all-tax-payers.create') }}"
                    class="btn btn-primary"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.all_tax_payers.index_title')
                </h4>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.all_tax_payers.inputs.temple_user_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_tax_payers.inputs.tax_list_id')
                            </th>
                            <th class="text-right">
                                @lang('crud.all_tax_payers.inputs.paid_amount')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_tax_payers.inputs.paid_date')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_tax_payers.inputs.paid_to')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_tax_payers.inputs.receipt_no')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($allTaxPayers as $taxPayers)
                        <tr>
                            <td>
                                {{ optional($taxPayers->templeUser)->name ?? '-'
                                }}
                            </td>
                            <td>
                                {{ optional($taxPayers->taxList)->name ?? '-' }}
                            </td>
                            <td>{{ $taxPayers->paid_amount ?? '-' }}</td>
                            <td>{{ $taxPayers->paid_date ?? '-' }}</td>
                            <td>{{ $taxPayers->paid_to ?? '-' }}</td>
                            <td>{{ $taxPayers->receipt_no ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $taxPayers)
                                    <a
                                        href="{{ route('all-tax-payers.edit', $taxPayers) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $taxPayers)
                                    <a
                                        href="{{ route('all-tax-payers.show', $taxPayers) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $taxPayers)
                                    <form
                                        action="{{ route('all-tax-payers.destroy', $taxPayers) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="icon ion-md-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                    <a href="{{ route('all-tax-payers.invoice-download', $taxPayers) }}">
                                        <button type="button" class="btn btn-light">
                                            <i class="icon ion-md-download"></i>
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">{!! $allTaxPayers->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
