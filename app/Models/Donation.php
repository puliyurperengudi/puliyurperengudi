<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donation extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'mobile_number',
        'father_name',
        'address',
        'receipt_no',
        'last_paid_amount',
        'last_paid_to',
        'tax_list_id',
        'kootam_id',
        'vagera_id',
        'caste_id',
        'remarks'
    ];

    protected $searchableFields = ['*'];

    public function taxList()
    {
        return $this->belongsTo(TaxList::class);
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
