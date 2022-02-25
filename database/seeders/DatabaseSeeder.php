<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Adding an admin user
        $user = \App\Models\User::create([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);
        $this->call(PermissionsSeeder::class);

//        $this->call(CasteSeeder::class);
//        $this->call(DonationSeeder::class);
//        $this->call(ExpenseSeeder::class);
//        $this->call(ExpenseTypeSeeder::class);
//        $this->call(KootamSeeder::class);
//        $this->call(TaxListSeeder::class);
//        $this->call(TaxPayersSeeder::class);
//        $this->call(TaxPaymentDetailsSeeder::class);
//        $this->call(TempleUserSeeder::class);
//        $this->call(UserSeeder::class);
//        $this->call(VageraSeeder::class);
    }
}
