@php $editing = isset($expense) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="tax_list_id" label="Tax List" required class="select2">
            @php $selected = old('tax_list_id', ($editing ? $expense->tax_list_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Tax List</option>
            @foreach($taxLists as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="expense_type_id" label="Expense Type" required class="select2-tag">
            @php $selected = old('expense_type_id', ($editing ? $expense->expense_type_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Expense Type</option>
            @foreach($expenseTypes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $expense->name : '')) }}"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="expense_date"
            label="Expense Date"
            value="{{ old('expense_date', ($editing ? optional($expense->expense_date)->format('Y-m-d') : '')) }}"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="paid_to"
            label="Paid To"
            value="{{ old('paid_to', ($editing ? $expense->paid_to : '')) }}"
            maxlength="255"
            placeholder="Paid To"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="bill_no"
            label="Bill No"
            value="{{ old('bill_no', ($editing ? $expense->bill_no : '')) }}"
            maxlength="255"
            placeholder="Bill No"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="amount"
            label="Amount"
            value="{{ old('amount', ($editing ? $expense->amount : '')) }}"
            step="0.01"
            placeholder="Amount"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
