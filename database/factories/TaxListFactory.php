<?php

namespace Database\Factories;

use App\Models\TaxList;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaxListFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TaxList::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'amount' => $this->faker->randomNumber(2),
        ];
    }
}
