<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\License>
 */
class LicenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = $this->faker->boolean(50) ? User::inRandomOrder()->first() : null;

        return [
            'user_id' => $user ? $user->id : null,
            'associate_email' => $user ? $user->email : $this->faker->unique()->safeEmail,
            'license_number' => $this->faker->unique()->numberBetween(100000000, 999999999),
        ];
    }
}
