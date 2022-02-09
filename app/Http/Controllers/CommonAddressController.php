<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class CommonAddressController extends Controller
{
    public function getStates(Request $request, $countryId)
    {
        $states = State::where('country_id', $countryId)->pluck('name', 'id');
        return response()->json(['states' => $states]);
    }

    public function getCities(Request $request, $stateId)
    {
        $cities = City::where('state_id', $stateId)->pluck('name', 'id');
        return response()->json(['cities' => $cities]);
    }
}
