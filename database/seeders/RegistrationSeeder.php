<?php

namespace Database\Seeders;

use App\Models\Registration;
use App\Models\Training;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;


class RegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $youngPilots = User::whereDate('birth_date', '>', Carbon::now()->subYears(18))
            ->get();
        $seniorPilot = User::whereDate('birth_date', '<=', Carbon::now()->subYears(18))
            ->get();

        for ($i = 0; $i < 100; $i++) {
            Registration::factory()->create(
                [
                    'user_id' => $youngPilots->random()->id,
                    'training_id' => Training::all()->where('type', 'Jeune pilote')->random()->id
                ]
            );
        }

        for ($i = 0; $i < 100; $i++) {
            Registration::factory()->create(
                [
                    'user_id' => $seniorPilot->random()->id,
                    'training_id' => Training::all()->where('type', 'Pilote senior')->random()->id
                ]
            );
        }
    }
}
