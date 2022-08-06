@extends('layouts.app')

@section('content')
<div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>
                        {{ __('Temple User Report') }}
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
                            <x-inputs.select name="caste_list" label="Caste" class="select2">
                                <option disabled selected>Please select a Caste</option>
                                @foreach($castes as $caste)
                                    <option value="{{ $caste->id }}">{{ $caste->name }}</option>
                                @endforeach
                            </x-inputs.select>
                        </x-inputs.group>
                        <x-inputs.group class="col-sm-4">
                            <x-inputs.select name="kootam" label="Kootam" class="select2">
                                <option disabled selected>Please select a Kootam</option>
                                @foreach($kootams as $kootam)
                                    <option value="{{ $kootam->id }}">{{ $kootam->name }}</option>
                                @endforeach
                            </x-inputs.select>
                        </x-inputs.group>
                        <x-inputs.group class="col-sm-4">
                            <x-inputs.select name="country_id" label="Country" class="select2" onchange="countrySelectChange()">
                                <option disabled selected>Please select the Country</option>
                                @foreach($countries as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>
                                @endforeach
                            </x-inputs.select>
                        </x-inputs.group>
                        <x-inputs.group class="col-sm-4" id="state-select">
                            <x-inputs.select name="state_id" label="State" class="select2" onchange="stateSelectChange()">
                                <option disabled selected>Please select the State</option>
                            </x-inputs.select>
                        </x-inputs.group>
                        <x-inputs.group class="col-sm-4" id="city-select">
                            <x-inputs.select name="city_id" label="City" class="select2" onchange="citySelectChange()">
                                <option disabled selected>Please select the City</option>
                            </x-inputs.select>
                        </x-inputs.group>
                        <x-inputs.group class="col-sm-4" id="village-select">
                            <x-inputs.select name="village_id" label="Village" class="select2">
                                <option disabled selected>Please select the Village</option>
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
        $(document).ready(function() {
            setTimeout(
                function() {
                    $('#state-select').hide();
                    $('#city-select').hide();
                    $('#village-select').hide();
                }, 100);
        });

        function loadDataTable() {
            $('#dataTableBuilder').on('preXhr.dt', function ( e, settings, data ) {
                data.from_date = $('#from_date').val();
                data.to_date = $('#to_date').val();
                data.caste_id = $('#caste_list').val();
                data.kootam_id = $('#kootam').val();
                data.country_id = $('#country_id').val();
                data.state_id = $('#state_id').val();
                data.city_id = $('#city_id').val();
                data.village_id = $('#village_id').val();
            });

            $('.buttons-reload').click();
        }

        function countrySelectChange() {
            if ($("#country_id").val()) {
                $.ajax({
                    type: 'GET',
                    url: '/get-states/' + $("#country_id").val(),
                    async: false,
                    success: function (msg) {
                        if (msg.states) {
                            $('#state_id').empty();
                            $('#state_id').append('<option value="" selected>Please select a State</option>');
                            jQuery.each(msg.states, function (key, value) {
                                $('#state_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    },
                    error: function (error) {
                        console.log(error);
                        alert("Internal Error");
                    }
                });
                $('#state-select').show();
                $('#city-select').hide();
                $('#village-select').hide();
            }
        }

        function stateSelectChange() {
            $.ajax({
                type: 'GET',
                url: '/get-cities/' + $("#state_id").val(),
                async: false,
                success: function (msg) {
                    if (msg.cities) {
                        $('#city_id').empty();
                        $('#city_id').append('<option value="" selected>Please select a City</option>');
                        jQuery.each(msg.cities, function (key, value) {
                            $('#city_id').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                },
                error: function (error) {
                    console.log(error);
                    alert("Internal Error");
                }
            });
            $('#city-select').show();
            $('#village-select').hide();
        }

        function citySelectChange() {
            $.ajax({
                type: 'GET',
                url: '/get-villages/' + $("#city_id").val(),
                async: false,
                success: function (msg) {
                    if (msg.villages) {
                        $('#village_id').empty();
                        $('#village_id').append('<option value="" selected>Please select a Village</option>');
                        jQuery.each(msg.villages, function (key, value) {
                            $('#village_id').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                },
                error: function (error) {
                    console.log(error);
                    alert("Internal Error");
                }
            });
            $('#village-select').show();
        }
    </script>
@endpush
