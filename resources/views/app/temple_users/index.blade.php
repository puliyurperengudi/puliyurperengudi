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
                @can('create', App\Models\TempleUser::class)
                <a href="{{ route('temple-users.create') }}" class="btn btn-primary">
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
                    @lang('crud.temple_users.index_title')
                </h4>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                User Id
                            </th>
                            <th class="text-left">
                                @lang('crud.temple_users.inputs.name')
                            </th>
                            <th class="text-left">
                                @lang('crud.temple_users.inputs.father_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.temple_users.inputs.address')
                            </th>
                            <th class="text-left">
                                @lang('crud.temple_users.inputs.mobile_number')
                            </th>
                            <th class="text-left">
                                @lang('crud.temple_users.inputs.kootam_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.temple_users.inputs.vagera')
                            </th>
                            <th class="text-left">
                                @lang('crud.temple_users.inputs.caste_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($templeUsers as $templeUser)
                        <tr>
                            <td>{{ $templeUser->userId() ?? '-' }}</td>
                            <td>{{ $templeUser->name ?? '-' }}</td>
                            <td>{{ $templeUser->father_name ?? '-' }}</td>
                            <td>{{ $templeUser->address ?? '-' }}</td>
                            <td>{{ $templeUser->mobile_number ?? '-' }}</td>
                            <td>
                                {{ optional($templeUser->kootam)->name ?? '-' }}
                            </td>
                            <td>
                                {{ $templeUser->vagera ?: '-' }}
                            </td>
                            <td>
                                {{ optional($templeUser->caste)->name ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $templeUser)
                                    <a
                                        href="{{ route('temple-users.edit', $templeUser) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-create"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $templeUser)
                                    <a
                                        href="{{ route('temple-users.show', $templeUser) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="icon ion-md-eye"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $templeUser)
                                    <form
                                        action="{{ route('temple-users.destroy', $templeUser) }}"
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
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="8">{!! $templeUsers->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
