<?php

namespace Database\Seeders;

use App\Models\Caste;
use Illuminate\Database\Seeder;

class CasteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Caste::factory()
            ->count(5)
            ->create();
    }
}
