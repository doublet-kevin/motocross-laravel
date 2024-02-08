<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserWithLicenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'club_id' => 1,
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'region' => $this->faker->state,
            'city' => $this->faker->city,
            'postal_code' =>    $this->faker->randomNumber(5, true),
            'email' => $this->faker->unique()->safeEmail,
            'birth_date' => $this->faker->dateTimeBetween('-50 years', '-18 years')->format('Y-m-d'),
            'password' => bcrypt('password'),
            'role_id' => 1,
        ];
    }
}
