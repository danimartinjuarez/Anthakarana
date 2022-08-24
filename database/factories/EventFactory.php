<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EventFactory extends Factory
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
            'description' => $this->faker->company(),
            'image' => $this->faker->imageUrl(),
            'date' => $this->faker->dateTime($max = 'now', $timezone = null),
        ];
    }
}
