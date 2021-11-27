<?php

namespace Database\Seeders;

use App\Models\TaxList;
use Illuminate\Database\Seeder;

class TaxListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaxList::factory()
            ->count(5)
            ->create();
    }
}
