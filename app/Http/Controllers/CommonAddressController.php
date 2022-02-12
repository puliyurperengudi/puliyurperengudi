<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use App\Models\Village;
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

    public function getVillages(Request $request, $cityId)
    {
        $villages = Village::where('city_id', $cityId)->pluck('name', 'id');
        return response()->json(['villages' => $villages]);
    }
}
