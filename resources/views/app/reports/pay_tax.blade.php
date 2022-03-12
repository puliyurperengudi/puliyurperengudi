@extends('layouts.app')

@section('content')
<div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>
                        {{ __('Pay Tax Report') }}
                    </span>
                </div>

                <div class="card-body">
                    <div class="row">
                        <x-inputs.group class="col-sm-4">
                            <x-inputs.date
                                name="from_date"
                                label="From Date"
                                required
                            ></x-inputs.date>
                        </x-inputs.group>
                        <x-inputs.group class="col-sm-4">
                            <x-inputs.date
                                name="to_date"
                                label="To Date"
                                required
                            ></x-inputs.date>
                        </x-inputs.group>
                        <x-inputs.group class="col-sm-4">
                            <x-inputs.select name="temple_user" label="Temple User" class="select2">
                                <option disabled selected>Please select a User</option>
                                @foreach($templeUsers as $templeUser)
                                    <option value="{{ $templeUser->id }}">{{ $templeUser->name }}</option>
                                @endforeach
                            </x-inputs.select>
                        </x-inputs.group>
                        <x-inputs.group class="col-sm-4">
                            <x-inputs.select name="tax_list" label="Tax List" class="select2">
                                <option disabled selected>Please select a Tax List</option>
                                @foreach($taxLists as $taxList)
                                    <option value="{{ $taxList->id }}">{{ $taxList->name }}</option>
                                @endforeach
                            </x-inputs.select>
                        </x-inputs.group>
                        <div class="col-sm-2" style="padding-top: 30px">
                            <button type="button" class="btn btn-primary btn-sm" onclick="loadDataTable()">Filter</button>
                            <button type="button" class="btn btn-info btn-sm" onClick="window.location.reload();">Clear</button>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="card-body">
                    {!! $dataTable->table() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>
    {!! $dataTable->scripts() !!}

    <script>
        function loadDataTable() {
            $('#dataTableBuilder').on('preXhr.dt', function ( e, settings, data ) {
                data.from_date = $('#from_date').val();
                data.to_date = $('#to_date').val();
                data.temple_user_id = $('#temple_user').val();
                data.tax_list_id = $('#tax_list').val();
            });

            $('.buttons-reload').click();
        }
    </script>
@endpush
