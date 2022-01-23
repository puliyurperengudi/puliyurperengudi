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
                        <select name="tax_list" id="tax-list">
                            <option value="ALL" @if(!$taxListId) selected @endif>All</option>
                          @foreach($taxLists as $taxList)
                                <option value="{{ $taxList->id }}" @if($taxListId == $taxList->id) selected @endif>{{ $taxList->name }}</option>
                          @endforeach
                        </select>
                    </span>
                </div>

                <div class="card-body">
                    {{ __('Welcome ') . auth()->user()->name . '!!!' }}
                </div>

                <div class="row" style="padding-left: 15px; padding-right: 15px;">
                    <div class="col-md-3">
                        <div class="info-box bg-blue">
                            <div class="info-box-content text-center">
                                <span class="info-box-text">Total Tax Collected / மொத்த வரி வசூல்</span>
                                <span class="info-box-number">₹{{ number_format($totalTax, 2) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box bg-red">
                            <div class="info-box-content text-center">
                                <span class="info-box-text">Total Donation / மொத்த நன்கொடை வசூல்</span>
                                <span class="info-box-number">₹{{ number_format($totalDonation, 2) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box bg-green">
                            <div class="info-box-content text-center">
                                <span class="info-box-text">Total Expenses / மொத்த செலவுகள்</span>
                                <span class="info-box-number">₹{{ number_format($totalExpense, 2) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box bg-yellow">
                            <div class="info-box-content text-center">
                                <span class="info-box-text">Total Balance / மொத்த சமநிலை</span>
                                <span class="info-box-number">₹{{ number_format((($totalTax + $totalDonation) - $totalExpense), 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $('#tax-list').change(function(){
        window.location.href = '{{ route('home') }}' + '?tax-list=' + $(this).val();
    })
</script>

@endsection
