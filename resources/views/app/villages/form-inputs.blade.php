@php $editing = isset($village) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $village->name : '')) }}"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="country_id" label="Country" required class="select2" onchange="countrySelectChange()">
            @php $selected = old('country_id', ($editing ? $village->country_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select a Country</option>
            @foreach($countries as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    @php
        $oldStateId = old('state_id', ($editing ? $village->state_id : ''));
        $oldCityId = old('city_id', ($editing ? $village->city_id : ''));
    @endphp

    <x-inputs.group class="col-sm-12" id="state-select" required onchange="stateSelectChange()">
        <x-inputs.select name="state_id" label="State" required class="select2">
            <option disabled {{ empty($oldStateId) ? 'selected' : '' }}>Please select a State</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12" id="city-select" required>
        <x-inputs.select name="city_id" label="City" required class="select2">
            <option disabled {{ empty($oldCityId) ? 'selected' : '' }}>Please select a City</option>
        </x-inputs.select>
    </x-inputs.group>
</div>

<script>
    $(document).ready(function() {
        setTimeout(
            function() {
                $('#state-select').hide();
                $('#city-select').hide();
                countrySelectChange();
                if ("{{ $editing }}") {
                    stateSelectChange();
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
    }
</script>
