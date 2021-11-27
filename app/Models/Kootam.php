<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kootam extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'caste_id'];

    protected $searchableFields = ['*'];

    public function vageras()
    {
        return $this->hasMany(Vagera::class);
    }

    public function templeUsers()
    {
        return $this->hasMany(TempleUser::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function caste()
    {
        return $this->belongsTo(Caste::class);
    }
}
