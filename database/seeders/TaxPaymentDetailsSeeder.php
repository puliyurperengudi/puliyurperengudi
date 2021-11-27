<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TaxPaymentDetails;

class TaxPaymentDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaxPaymentDetails::factory()
            ->count(5)
            ->create();
    }
}
