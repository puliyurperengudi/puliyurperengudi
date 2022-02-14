@extends('layouts.app')

@section('content')
<div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>
                        {{ __('Dashboard') }}
                    </span>
                    <span class="float-right">
                        <label for="tax-list" style="padding-right: 5px">Tax List </label>
                        <select name="tax_list" id="tax-list" class="select2">
                            <option value="ALL" @if(false) selected @endif>All</option>
                        </select>
                    </span>
                </div>

{{--                <div class="card-body">--}}
{{--                    {{ __('Welcome ') . auth()->user()->name . '!!!' }}--}}
{{--                </div>--}}

                <div class="card-body">
                    {!! $dataTable->table() !!}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    //
</script>
@endsection

{{--@push('scripts')--}}
{{--    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">--}}
{{--    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>--}}
{{--    <script src="/vendor/datatables/buttons.server-side.js"></script>--}}
{{--    {!! $dataTable->scripts() !!}--}}
{{--@endpush--}}
