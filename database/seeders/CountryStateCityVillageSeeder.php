<?php

use App\Models\Caste;
use Illuminate\Database\Seeder;

class CountryStateCityVillageSeeder extends Seeder
{

    public function run()
    {
        $country = \App\Models\Country::create([
            'name' => 'India'
        ]);

        $state = \App\Models\State::create([
            'name' => 'Tamil nadu',
            'country_id' => $country->id
        ]);

        $city = \App\Models\City::create([
            'name' => 'Karur',
            'country_id' => $country->id,
            'state_id' => $state->id
        ]);

        $villageList = [
            ['name' => 'Achamapuram', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Andankoil East', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Andankoil(West)', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Appipalayam', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Athur', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Emur', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Inam Karur', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Jegadabi', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'K.Pichampatti', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Kadaparai', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Kakkavadi', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Karuppampalayam', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Karur', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Kombupalayam', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Koyamballi', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Kuppuchipalayam', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Manavadi', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Manmangalam', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Melapalayam', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Minampalli-Pachamadevi', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Mookanankurichi', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'N.Kadambankurichi', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Nanjaipugalur', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Nanniyur', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Nerur North', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Nerur South', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'P.Kadambankurichi', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Paganatham', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Pallapalayam', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Puliyur', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Punjai Thottakurichi', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Punjaipugalur', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Puthambur', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Senapiratti', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Somur', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Thalapatti', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Thanthoni', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Thirukkattuthurai', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Thirumanilaiyur', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'TNPL Pugalur', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Uppidamangalam', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Vangal', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Vellianai', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
            ['name' => 'Vettamangalam', 'country_id' => $city->country_id, 'state_id' => $city->state_id, 'city_id' => $city->id],
        ];

        \App\Models\Village::insert($villageList);
    }
}
