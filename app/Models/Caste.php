<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Caste extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name'];

    protected $searchableFields = ['*'];

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function templeUsers()
    {
        return $this->hasMany(TempleUser::class);
    }

    public function kootams()
    {
        return $this->hasMany(Kootam::class);
    }
}
