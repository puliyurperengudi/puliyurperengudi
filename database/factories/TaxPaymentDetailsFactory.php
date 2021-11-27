<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\TaxPaymentDetails;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaxPaymentDetailsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TaxPaymentDetails::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'balance_amount' => $this->faker->randomNumber(2),
            'total_amount_paid' => $this->faker->randomNumber(2),
            'total_tax_amount' => $this->faker->randomNumber(2),
            'tax_payers_id' => \App\Models\TaxPayers::factory(),
        ];
    }
}
