<?php

namespace Database\Seeders;

use App\Models\TaxPayers;
use Illuminate\Database\Seeder;

class TaxPayersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaxPayers::factory()
            ->count(5)
            ->create();
    }
}
