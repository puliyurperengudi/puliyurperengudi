<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaxPaymentDetails extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'tax_payers_id',
        'balance_amount',
        'total_amount_paid',
        'total_tax_amount',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'tax_payment_details';

    public function taxPayers()
    {
        return $this->belongsTo(TaxPayers::class);
    }
}
