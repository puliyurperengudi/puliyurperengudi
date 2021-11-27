<?php

namespace Database\Factories;

use App\Models\Vagera;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class VageraFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vagera::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'kootam_id' => \App\Models\Kootam::factory(),
        ];
    }
}
