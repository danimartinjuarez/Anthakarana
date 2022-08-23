<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EventATFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'title' => $this->faker->company(),
            'people' => $this->faker->biasedNumberBetween($min = 1, $max = 10, $function = 'sqrt'),
            'description' => $this->faker->realText(),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
