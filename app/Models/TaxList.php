<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaxList extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'amount'];

    protected $searchableFields = ['*'];

    protected $table = 'tax_lists';

    public function allTaxPayers()
    {
        return $this->hasMany(TaxPayers::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
