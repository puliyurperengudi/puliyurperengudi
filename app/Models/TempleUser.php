<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TempleUser extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'father_name',
        'address',
        'mobile_number',
        'kootam_id',
        'vagera',
        'caste_id',
        'country_id',
        'state_id',
        'city_id',
        'village_id'
    ];

    protected $searchableFields = ['*'];

    protected $table = 'temple_users';

    public function allTaxPayers()
    {
        return $this->hasMany(TaxPayers::class);
    }

    public function kootam()
    {
        return $this->belongsTo(Kootam::class);
    }

    public function vagera()
    {
        return $this->belongsTo(Vagera::class);
    }

    public function caste()
    {
        return $this->belongsTo(Caste::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function village()
    {
        return $this->belongsTo(Village::class);
    }

    public function userId()
    {
        return TaxPayers::USER_ID_PREFIX . $this->id;
    }

    public function getAddress()
    {
        $this->load('village', 'city', 'state', 'country');
        return $this->village->name . ', ' . $this->city->name . ', ' . $this->state->name . ', ' . $this->country->name . '.';
    }
}
