<?php

namespace Database\Factories;

use App\Models\TaxPayers;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaxPayersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TaxPayers::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'payment_bill_no' => $this->faker->text(255),
            'paid_amount' => $this->faker->randomNumber(2),
            'paid_date' => $this->faker->date,
            'paid_to' => $this->faker->text(255),
            'receipt_no' => $this->faker->text(255),
            'temple_user_id' => \App\Models\TempleUser::factory(),
            'tax_list_id' => \App\Models\TaxList::factory(),
        ];
    }
}
