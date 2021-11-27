<?php

namespace Database\Seeders;

use App\Models\Kootam;
use Illuminate\Database\Seeder;

class KootamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kootam::factory()
            ->count(5)
            ->create();
    }
}
