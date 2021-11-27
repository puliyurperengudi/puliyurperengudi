<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaxPayers extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'temple_user_id',
        'tax_list_id',
        'payment_bill_no',
        'paid_amount',
        'paid_date',
        'paid_to',
        'receipt_no',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'tax_payers';

    protected $casts = [
        'paid_date' => 'date',
    ];

    public function templeUser()
    {
        return $this->belongsTo(TempleUser::class);
    }

    public function taxList()
    {
        return $this->belongsTo(TaxList::class);
    }

    public function allTaxPaymentDetails()
    {
        return $this->hasMany(TaxPaymentDetails::class);
    }
}
