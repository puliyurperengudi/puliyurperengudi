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
                    <option value="{{ $templeUser->id }}" {{ $selected == $templeUser->id ? 'selected' : '' }} >{{ $templeUser->userId() . '   ||   ' . $templeUser->name . '   ||   ' . $templeUser->father_name . '   ||   ' . $templeUser->mobile_number . '   ||   ' . $templeUser->address }}</option>
                @endforeach
            </x-inputs.select>
        </x-inputs.group>
    </div>

    @php
        $oldStateId = old('state_id', ($editing ? $templeUser->state_id : ''));
        $oldCityId = old('city_id', ($editing ? $templeUser->city_id : ''));
        $oldVillageId = old('village_id', ($editing ? $templeUser->village_id : ''));
    @endphp

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

            <x-inputs.group class="col-sm-12">
                <x-inputs.select name="country_id" label="Country" required class="select2" onchange="countrySelectChange()">
                    @php $selected = old('country_id', ($editing ? $templeUser->country_id : '')) @endphp
                    <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Country</option>
                    @foreach($countries as $value => $label)
                        <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
                    @endforeach
                </x-inputs.select>
            </x-inputs.group>

            <x-inputs.group class="col-sm-12" id="state-select">
                <x-inputs.select name="state_id" label="State" required class="select2" onchange="stateSelectChange()">
                    @php $selected = old('state_id', ($editing ? $templeUser->state_id : '')) @endphp
                    <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the State</option>
                </x-inputs.select>
            </x-inputs.group>

            <x-inputs.group class="col-sm-12" id="city-select">
                <x-inputs.select name="city_id" label="City" required class="select2" onchange="citySelectChange()">
                    @php $selected = old('city_id', ($editing ? $templeUser->city_id : '')) @endphp
                    <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the City</option>
                </x-inputs.select>
            </x-inputs.group>

            <x-inputs.group class="col-sm-12" id="village-select">
                <x-inputs.select name="village_id" label="Village" required class="select2">
                    @php $selected = old('village_id', ($editing ? $templeUser->village_id : '')) @endphp
                    <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Village</option>
                </x-inputs.select>
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
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="remarks"
            label="Remarks"
            value="{{ old('remarks', ($editing ? $donation->remarks : '')) }}"
            maxlength="255"
            placeholder="Remarks"
        ></x-inputs.text>
    </x-inputs.group>
</div>

<script>
    $(document).ready(function() {
        setTimeout(
            function() {
                $('#state-select').hide();
                $('#city-select').hide();
                $('#village-select').hide();
                updateUserTypeFields();
                if ($('#user-type').val() == "new-user") {
                    countrySelectChange();
                    stateSelectChange();
                    citySelectChange();
                }
            }, 1000);
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

            $('#caste_id').attr('required', true);
            $('#kootam_id').attr('required', true);
        } else {
            $('#existing-user-div').hide();
            $('#new-user-div').show();
            $('#name-input').attr('required', true);
            $('#mobile-number-input').attr('required', true);
            $('#father-name-input').attr('required', true);
            $('#address-input').attr('required', true);

            $('#caste_id').attr('required', false);
            $('#kootam_id').attr('required', false);
        }
    }

    function countrySelectChange() {
        if ($("#country_id").val()) {
            var oldStateId = '{{ $oldStateId }}';
            $.ajax({
                type: 'GET',
                url: '/get-states/' + $("#country_id").val(),
                async: false,
                success: function (msg) {
                    if (msg.states) {
                        $('#state_id').empty();
                        $('#state_id').append('<option value=""' + ((oldStateId == "") ? 'selected' : '') + '>Please select a State</option>');
                        var selectedText = '';
                        jQuery.each(msg.states, function (key, value) {
                            selectedText = (key == oldStateId) ? 'selected' : '';
                            $('#state_id').append('<option value="' + key + '" ' + selectedText + '>' + value + '</option>');
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
        var oldCityId = '{{ $oldCityId }}';
        if ($("#state_id").val()) {
            $.ajax({
                type: 'GET',
                url: '/get-cities/' + $("#state_id").val(),
                async: false,
                success: function (msg) {
                    if (msg.cities) {
                        $('#city_id').empty();
                        $('#city_id').append('<option value=""' + ((oldCityId == "") ? 'selected' : '') + '>Please select a City</option>');
                        var selectedText = '';
                        jQuery.each(msg.cities, function (key, value) {
                            selectedText = (key == oldCityId) ? 'selected' : '';
                            console.log(selectedText);
                            $('#city_id').append('<option value="' + key + '" ' + selectedText + '>' + value + '</option>');
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
    }

    function citySelectChange() {
        var oldVillageId = '{{ $oldVillageId }}';
        if ($("#city_id").val()) {
            $.ajax({
                type: 'GET',
                url: '/get-villages/' + $("#city_id").val(),
                async: false,
                success: function (msg) {
                    if (msg.villages) {
                        $('#village_id').empty();
                        $('#village_id').append('<option value=""' + ((oldVillageId == "") ? 'selected' : '') + '>Please select a Village</option>');
                        var selectedText = '';
                        jQuery.each(msg.villages, function (key, value) {
                            selectedText = (key == oldVillageId) ? 'selected' : '';
                            console.log(selectedText);
                            $('#village_id').append('<option value="' + key + '" ' + selectedText + '>' + value + '</option>');
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
    }
</script>
