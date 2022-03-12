@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($taxPayerDetails as $taxPayer)
            <div class="card">
                <div class="card-body">
                    <div class="mt-4">
                        <div class="mb-4">
                            <h5>Temple User</h5>
                            <span>{{ $taxPayer->templeUser->name }}</span>
                        </div>
                        <div class="mb-4">
                            <h5>Tax List</h5>
                            <span>{{ $taxPayer->taxList->name }}</span>
                        </div>
                        <div class="mb-4">
                            <h5>Paid Amount</h5>
                            <span>{{ $taxPayer->paid_amount }}</span>
                        </div>
                        <div class="mb-4">
                            <h5>Paid Date</h5>
                            <span>{{ $taxPayer->paid_date->format('Y-m-d') }}</span>
                        </div>
                        <div class="mb-4">
                            <h5>Paid To</h5>
                            <span>{{ $taxPayer->paid_to }}</span>
                        </div>
                        <div class="mb-4">
                            <h5>Receipt No</h5>
                            <span>{{ $taxPayer->receipt_no }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
