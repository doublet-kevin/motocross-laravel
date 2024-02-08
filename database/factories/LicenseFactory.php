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
        $user = User::factory()->create();
        return [
            'user_id' => $user->id,
            'associate_email' => $user->email,
            'license_number' => $this->faker->unique()->numerify('MC_AUR-####'),
        ];
    }
}
