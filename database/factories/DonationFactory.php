<?php

namespace Database\Factories;

use App\Models\Donation;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class DonationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Donation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'mobile_number' => $this->faker->phoneNumber,
            'father_name' => $this->faker->text(255),
            'address' => $this->faker->text,
            'receipt_no' => $this->faker->text(255),
            'last_paid_amount' => $this->faker->randomNumber(2),
            'last_paid_to' => $this->faker->randomNumber(2),
            'tax_list_id' => \App\Models\TaxList::factory(),
            'kootam_id' => \App\Models\Kootam::factory(),
            'vagera_id' => \App\Models\Vagera::factory(),
            'caste_id' => \App\Models\Caste::factory(),
        ];
    }
}
