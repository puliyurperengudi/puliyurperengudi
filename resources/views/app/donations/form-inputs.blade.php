@php $editing = isset($donation) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="tax_list_id" label="Tax List" required>
            @php $selected = old('tax_list_id', ($editing ? $donation->tax_list_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Tax List</option>
            @foreach($taxLists as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $donation->name : '')) }}"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="mobile_number"
            label="Mobile Number"
            value="{{ old('mobile_number', ($editing ? $donation->mobile_number : '')) }}"
            maxlength="255"
            placeholder="Mobile Number"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="father_name"
            label="Father Name"
            value="{{ old('father_name', ($editing ? $donation->father_name : '')) }}"
            maxlength="255"
            placeholder="Father Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="address"
            label="Address"
            maxlength="255"
            required
            >{{ old('address', ($editing ? $donation->address : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="receipt_no"
            label="Receipt No"
            value="{{ old('receipt_no', ($editing ? $donation->receipt_no : '')) }}"
            maxlength="255"
            placeholder="Receipt No"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="last_paid_amount"
            label="Paid Amount"
            value="{{ old('last_paid_amount', ($editing ? $donation->last_paid_amount : '')) }}"
            step="0.01"
            placeholder="Paid Amount"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="kootam_id" label="Kootam" required>
            @php $selected = old('kootam_id', ($editing ? $donation->kootam_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Kootam</option>
            @foreach($kootams as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="vagera_id" label="Vagera" required>
            @php $selected = old('vagera_id', ($editing ? $donation->vagera_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Vagera</option>
            @foreach($vageras as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="caste_id" label="Caste" required>
            @php $selected = old('caste_id', ($editing ? $donation->caste_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Caste</option>
            @foreach($castes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="remarks"
            label="Remarks"
            value="{{ old('remarks', ($editing ? $donation->remarks : '')) }}"
            maxlength="255"
            placeholder="Remarks"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
