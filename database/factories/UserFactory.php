<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'club_id' => 1,
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'region' => $this->faker->state,
            'city' => $this->faker->city,
            'postal_code' => $this->faker->randomNumber(5, true),
            'email' => $this->faker->unique()->safeEmail,
            'birth_date' => $this->faker->dateTimeBetween('-13 years', '-12 years')->format('Y-m-d'),
            'license_number' => $this->faker->unique()->numerify('MC_AUR-####'),
            'password' => bcrypt('password'),
            'role_id' => 1,
            'img_profil' => null, // Assuming this is nullable in your model
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
