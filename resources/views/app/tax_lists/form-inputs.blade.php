@php $editing = isset($taxList) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $taxList->name : '')) }}"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="amount"
            label="Amount"
            value="{{ old('amount', ($editing ? $taxList->amount : '')) }}"
            max="255"
            step="0.01"
            placeholder="Amount"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
