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
			'total_people' => $this->faker->biasedNumberBetween($min = 1, $max = 50, $function = 'sqrt'),
			'sub_people' => $this->faker->biasedNumberBetween($min = 1, $max = 50, $function = 'sqrt'),
			'description' => $this->faker->company(),
			'image' => $this->faker->imageUrl(),
			'date' => $this->faker->date($format = 'Y-m-d', $min = 'now', $timezone = null),
			'start_hour' => $this->faker->time($format = 'H:i', $startTime = 'now',),
		];
	}
}
