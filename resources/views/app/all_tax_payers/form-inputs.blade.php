@php $editing = isset($taxPayers) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="temple_user_id" label="Temple User" required>
            @php $selected = old('temple_user_id', ($editing ? $taxPayers->temple_user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Temple User</option>
            @foreach($templeUsers as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="tax_list_id" label="Tax List" required>
            @php $selected = old('tax_list_id', ($editing ? $taxPayers->tax_list_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Tax List</option>
            @foreach($taxLists as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="paid_amount"
            label="Paid Amount"
            value="{{ old('paid_amount', ($editing ? $taxPayers->paid_amount : '')) }}"
            max="255"
            step="0.01"
            placeholder="Paid Amount"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="paid_date"
            label="Paid Date"
            value="{{ old('paid_date', ($editing ? optional($taxPayers->paid_date)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="paid_to"
            label="Paid To"
            value="{{ old('paid_to', ($editing ? $taxPayers->paid_to : '')) }}"
            maxlength="255"
            placeholder="Paid To"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="receipt_no"
            label="Receipt No"
            value="{{ old('receipt_no', ($editing ? $taxPayers->receipt_no : '')) }}"
            maxlength="255"
            placeholder="Receipt No"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
