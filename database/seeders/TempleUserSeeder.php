<?php

namespace Database\Seeders;

use App\Models\TempleUser;
use Illuminate\Database\Seeder;

class TempleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TempleUser::factory()
            ->count(5)
            ->create();
    }
}
