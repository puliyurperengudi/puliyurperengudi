@php $editing = isset($templeUser) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $templeUser->name : '')) }}"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="father_name"
            label="Father Name"
            value="{{ old('father_name', ($editing ? $templeUser->father_name : '')) }}"
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
            >{{ old('address', ($editing ? $templeUser->address : ''))
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

    @php
        $oldStateId = old('state_id', ($editing ? $templeUser->state_id : ''));
        $oldCityId = old('city_id', ($editing ? $templeUser->city_id : ''));
        $oldVillageId = old('village_id', ($editing ? $templeUser->village_id : ''));
    @endphp

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

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="mobile_number"
            label="Mobile Number"
            value="{{ old('mobile_number', ($editing ? $templeUser->mobile_number : '')) }}"
            maxlength="255"
            placeholder="Mobile Number"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="caste_id" label="Caste" required class="select2">
            @php $selected = old('caste_id', ($editing ? $templeUser->caste_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Caste</option>
            @foreach($castes as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="kootam_id" label="Kootam" required class="select2">
            @php $selected = old('kootam_id', ($editing ? $templeUser->kootam_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Kootam</option>
            @foreach($kootams as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="vagera"
            label="Vagera"
            value="{{ old('vagera', ($editing ? $templeUser->vagera : '')) }}"
            maxlength="255"
            placeholder="Vagera"
            required
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
                countrySelectChange();
                if ("{{ $editing }}") {
                    stateSelectChange();
                    citySelectChange();
                }
            }, 1000);
    });

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

    function citySelectChange() {
        var oldVillageId = '{{ $oldVillageId }}';
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
</script>
