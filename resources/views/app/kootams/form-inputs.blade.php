@php $editing = isset($kootam) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $kootam->name : '')) }}"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="caste_id" label="Caste" required>
            @php $selected = old('caste_id', ($editing ? $kootam->caste_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Caste</option>
            @foreach($castes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
