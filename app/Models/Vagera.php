<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vagera extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'kootam_id'];

    protected $searchableFields = ['*'];

    public function kootam()
    {
        return $this->belongsTo(Kootam::class);
    }

    public function templeUsers()
    {
        return $this->hasMany(TempleUser::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
