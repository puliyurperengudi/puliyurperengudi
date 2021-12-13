@extends('layouts.app')

@section('content')
<div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{ __('Welcome ') . auth()->user()->name . '!!!' }}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box bg-blue">
                <div class="info-box-content text-center">
                    <span class="info-box-text">Total Tax Collected</span>
                    <span class="info-box-number">₹{{ number_format($totalTax, 2) }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box bg-red">
                <div class="info-box-content text-center">
                    <span class="info-box-text">Total Donation Collected</span>
                    <span class="info-box-number">₹{{ number_format($totalDonation, 2) }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box bg-green">
                <div class="info-box-content text-center">
                    <span class="info-box-text">Total Expenses</span>
                    <span class="info-box-number">₹{{ number_format($totalExpense, 2) }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box bg-yellow">
                <div class="info-box-content text-center">
                    <span class="info-box-text">Available Balance</span>
                    <span class="info-box-number">₹{{ number_format((($totalTax + $totalDonation) - $totalExpense), 2) }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
