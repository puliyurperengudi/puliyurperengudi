<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expense extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'tax_list_id',
        'name',
        'expense_date',
        'paid_to',
        'bill_no',
        'amount',
        'expense_type_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'expense_date' => 'date',
    ];

    public function taxList()
    {
        return $this->belongsTo(TaxList::class);
    }

    public function expenseType()
    {
        return $this->belongsTo(ExpenseType::class);
    }
}
