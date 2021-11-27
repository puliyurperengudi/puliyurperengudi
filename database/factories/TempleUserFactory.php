<?php

namespace Database\Factories;

use App\Models\TempleUser;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TempleUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TempleUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'father_name' => $this->faker->text(255),
            'address' => $this->faker->text,
            'mobile_number' => $this->faker->text(255),
            'kootam_id' => \App\Models\Kootam::factory(),
            'vagera_id' => \App\Models\Vagera::factory(),
            'caste_id' => \App\Models\Caste::factory(),
        ];
    }
}
