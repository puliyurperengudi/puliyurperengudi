@php $editing = isset($donation) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="tax_list_id" label="Tax List" required class="select2">
            @php $selected = old('tax_list_id', ($editing ? $donation->tax_list_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Tax List</option>
            @foreach($taxLists as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    @php
        $oldUserType = old('user_type', 'existing-user');
        if ($editing) {
            $oldUserType = 'existing-user';
        }
    @endphp

    <div class="form-group col-sm-12">
        <label for="user-type" class="label">User Type</label>
        <select class="select2 form-control" name="user_type" id="user-type" required="required" autocomplete="off" @if($editing) disabled @endif>
            <option value="existing-user" @if($oldUserType == 'existing-user') selected @endif>Existing User</option>
            <option value="new-user" @if($oldUserType == 'new-user') selected @endif>New User</option>
        </select>
    </div>

    <div class="form-group col-sm-12" id="existing-user-div">
        <x-inputs.group class="col-sm-12">
            <x-inputs.select name="temple_user_id" label="Temple User" required class="select2">
                @php $selected = old('temple_user_id', ($editing ? $donation->temple_user_id : '')) @endphp
                <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select a Temple User</option>
                @foreach($templeUsers as $templeUser)
                    <option value="{{ $templeUser->id }}" {{ $selected == $templeUser->id ? 'selected' : '' }} >{{ $templeUser->name . '   ||   ' . $templeUser->father_name . '   ||   ' . $templeUser->mobile_number . '   ||   ' . $templeUser->address }}</option>
                @endforeach
            </x-inputs.select>
        </x-inputs.group>
    </div>

    @if(!$editing)
        <div class="form-group col-sm-12" id="new-user-div">
            <x-inputs.group class="col-sm-12">
                <x-inputs.text
                    name="name"
                    label="Name"
                    value="{{ old('name') }}"
                    maxlength="255"
                    placeholder="Name"
                    class="name-input"
                ></x-inputs.text>
            </x-inputs.group>

            <x-inputs.group class="col-sm-12">
                <x-inputs.text
                    name="mobile_number"
                    label="Mobile Number"
                    value="{{ old('mobile_number') }}"
                    maxlength="255"
                    placeholder="Mobile Number"
                    class="mobile-number-input"
                ></x-inputs.text>
            </x-inputs.group>

            <x-inputs.group class="col-sm-12">
                <x-inputs.text
                    name="father_name"
                    label="Father Name"
                    value="{{ old('father_name') }}"
                    maxlength="255"
                    placeholder="Father Name"
                    class="father-name-input"
                ></x-inputs.text>
            </x-inputs.group>

            <x-inputs.group class="col-sm-12">
                <x-inputs.textarea
                    name="address"
                    label="Address"
                    maxlength="255"
                    class="address-input"
                >{{ old('address', ($editing ? $donation->address : ''))
                }}</x-inputs.textarea
                >
            </x-inputs.group>
        </div>
    @endif

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
        <x-inputs.select name="kootam_id" label="Kootam" required class="select2">
            @php $selected = old('kootam_id', ($editing ? $donation->kootam_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Kootam</option>
            @foreach($kootams as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="caste_id" label="Caste" required class="select2">
            @php $selected = old('caste_id', ($editing ? $donation->caste_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Caste</option>
            @foreach($castes as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="vagera"
            label="Vagera"
            value="{{ old('vagera', ($editing ? $donation->vagera : '')) }}"
            maxlength="255"
            placeholder="Vagera"
            required
        ></x-inputs.text>
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

<script>
    $(document).ready(function() {
        updateUserTypeFields();
    });

    $('#user-type').change(function() {
        updateUserTypeFields();
    });

    function updateUserTypeFields() {
        if ($('#user-type').val() == "existing-user") {
            $('#new-user-div').hide();
            $('#existing-user-div').show();
            $('#name-input').attr('required', false);
            $('#mobile-number-input').attr('required', false);
            $('#father-name-input').attr('required', false);
            $('#address-input').attr('required', false);
        } else {
            $('#existing-user-div').hide();
            $('#new-user-div').show();
            $('#name-input').attr('required', true);
            $('#mobile-number-input').attr('required', true);
            $('#father-name-input').attr('required', true);
            $('#address-input').attr('required', true);
        }
    }
</script>
