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
                @can('create', App\Models\Donation::class)
                <a
                    href="{{ route('donations.create') }}"
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
                <h4 class="card-title">@lang('crud.donations.index_title')</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.donations.inputs.tax_list_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.donations.inputs.name')
                            </th>
                            <th class="text-left">
                                @lang('crud.donations.inputs.mobile_number')
                            </th>
                            <th class="text-left">
                                @lang('crud.donations.inputs.father_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.donations.inputs.address')
                            </th>
                            <th class="text-left">
                                @lang('crud.donations.inputs.receipt_no')
                            </th>
                            <th class="text-right">
                                @lang('crud.donations.inputs.last_paid_amount')
                            </th>
                            <th class="text-right">
                                @lang('crud.donations.inputs.last_paid_to')
                            </th>
                            <th class="text-left">
                                @lang('crud.donations.inputs.kootam_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.donations.inputs.vagera_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.donations.inputs.caste_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($donations as $donation)
                        <tr>
                            <td>
                                {{ optional($donation->taxList)->name ?? '-' }}
                            </td>
                            <td>{{ optional($donation->templeUser)->name ?? '-' }}</td>
                            <td>{{ optional($donation->templeUser)->mobile_number ?? '-' }}</td>
                            <td>{{ optional($donation->templeUser)->father_name ?? '-' }}</td>
                            <td>{{ optional($donation->templeUser)->address ?? '-' }}</td>
                            <td>{{ $donation->receipt_no ?? '-' }}</td>
                            <td>{{ $donation->last_paid_amount ?? '-' }}</td>
                            <td>{{ $donation->last_paid_to ?? '-' }}</td>
                            <td>
                                {{ optional($donation->kootam)->name ?? '-' }}
                            </td>
                            <td>
                                {{ $donation->vagera ?: '-' }}
                            </td>
                            <td>
                                {{ optional($donation->caste)->name ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $donation)
                                    <a
                                        href="{{ route('donations.edit', $donation) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $donation)
                                    <a
                                        href="{{ route('donations.show', $donation) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $donation)
                                    <form
                                        action="{{ route('donations.destroy', $donation) }}"
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
                                    <a href="{{ route('donations.invoice-download', $donation) }}">
                                        <button type="button" class="btn btn-light">
                                            <i class="icon ion-md-download"></i>
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="12">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="12">{!! $donations->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
