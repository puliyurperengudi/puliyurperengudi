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
        'vagera_id',
        'caste_id',
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
}
