<?php

namespace Database\Seeders;

use App\Models\Vagera;
use Illuminate\Database\Seeder;

class VageraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vagera::factory()
            ->count(5)
            ->create();
    }
}
