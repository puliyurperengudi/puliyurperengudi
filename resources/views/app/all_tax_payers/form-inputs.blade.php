@php $editing = isset($taxPayers) @endphp

<div class="row">

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="tax_list_id" label="Tax List" required id="tax_list_id" class="select2">
            @php $selected = old('tax_list_id', ($editing ? $taxPayers->tax_list_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Tax List</option>
            @foreach($taxLists as $value => $label)
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="temple_user_id" label="Temple User" required id="temple_user_id" class="select2">
            @php $selected = old('temple_user_id', ($editing ? $taxPayers->temple_user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Temple User</option>
            @foreach($templeUsers as $id => $templeUser)
            <option value="{{ $templeUser->first()->id }}" {{ $selected == $templeUser->first()->id ? 'selected' : '' }} >{{ $templeUser->first()->name }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <div class="card" style="width: 100%; padding-left: 20px; padding-right: 20px" id="user-details">
        <div class="card-body">
            <p><strong>User Id : </strong><span id="user-id"></span></p>
            <p><strong>Name : </strong><span id="user-name"></span></p>
            <p><strong>Father Name : </strong><span id="father-name"></span></p>
            <p><strong>Mobile Number : </strong><span id="mobile-number"></span></p>
            <p><strong>Address : </strong><span id="address"></span></p>
            <p><strong>Pending Amount : </strong><span id="pending-amount">-</span></p>
        </div>
    </div>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="paid_amount"
            label="Paid Amount"
            value="{{ old('paid_amount', ($editing ? $taxPayers->paid_amount : '')) }}"
            step="0.01"
            placeholder="Paid Amount"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="paid_date"
            label="Paid Date"
            value="{{ old('paid_date', ($editing ? optional($taxPayers->paid_date)->format(DATE_FORMAT) : '')) }}"
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
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="remarks"
            label="Remarks"
            value="{{ old('remarks', ($editing ? $taxPayers->remarks : '')) }}"
            maxlength="255"
            placeholder="Remarks"
        ></x-inputs.text>
    </x-inputs.group>
</div>

<script>
    var templeUsers = @json($templeUsers);
    $("#user-details").hide();

    $('#temple_user_id').change(function() {
        var selectedUser = templeUsers[$(this).val()][0];
        $("#user-id").html('{{ \App\Models\TaxPayers::USER_ID_PREFIX }}' + selectedUser.id);
        $("#user-name").html(selectedUser.name);
        $("#father-name").html(selectedUser.father_name);
        $("#mobile-number").html(selectedUser.mobile_number);
        $("#address").html(selectedUser.address);
        getTaxDetails();
        $("#user-details").show();
    });

    $('#tax_list_id').change(function() {
        getTaxDetails();
    });

    function getTaxDetails() {
        $.ajax({
            type: 'POST',
            url: '{{ route('donations.pending-tax') }}',
            data: {
                temple_user_id: $("#temple_user_id").val(),
                tax_list_id: $("#tax_list_id").val(),
            },
            success: function (msg) {
                if (msg.status == "success") {
                    $("#pending-amount").html("Rs." + msg.amount);
                } else {
                    $("#pending-amount").html('-');
                }
            },
            error: function (error) {
                console.log(error);
                alert("Internal Error");
            }
        });
    }
</script>
