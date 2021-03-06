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
        'remarks'
    ];

    const USER_ID_PREFIX = 'PP';

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

    public function scopeSearch($query, $search)
    {
        $query->where(function ($query) use ($search) {
            foreach ($this->getSearchableFields() as $field) {
                if ($field == 'temple_user_id') {
                    $updatedSearch = $search;
                    if (strlen($search) > 2) {
                        $firstTwoChar = substr($search, 0, 2);
                        if ($firstTwoChar == self::USER_ID_PREFIX || $firstTwoChar == strtolower(self::USER_ID_PREFIX)) {
                            $updatedSearch = substr($search, 2);
                        }
                    }
                    if ($updatedSearch != '' || $updatedSearch != ' ') {
                        $query->orWhere($field, $updatedSearch);
                    }
                } else {
                    $query->orWhere($field, 'like', "%{$search}%");
                }
            }
        });

        return $query;
    }
}
