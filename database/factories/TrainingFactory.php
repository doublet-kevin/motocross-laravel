<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Training>
 */
class TrainingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type = $this->faker->randomElement(['enfant', 'adulte']);

        $date = $this->faker->dateTimeBetween('+1 week', '+6 months');

        $hour = $this->faker->randomElement([10, 14, 17]);

        $date->setTime($hour, 0, 0);

        return [
            'circuit_id' => 1,
            'date' => $date->format('Y-m-d H:i:s'),
            'type' => $type,
            'max_participants' => $this->faker->randomElement([15, 75]),
        ];
    }
}
