<?php

namespace Database\Factories;

use App\Models\Expense;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpenseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Expense::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'expense_date' => $this->faker->date,
            'paid_to' => $this->faker->text(255),
            'bill_no' => $this->faker->text(255),
            'amount' => $this->faker->randomNumber(2),
            'tax_list_id' => \App\Models\TaxList::factory(),
            'expense_type_id' => \App\Models\ExpenseType::factory(),
        ];
    }
}
