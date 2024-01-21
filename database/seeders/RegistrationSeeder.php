<?php

namespace Database\Seeders;

use App\Models\Registration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Registration::create([
            'user_id' => '1',
            'training_id' => '1',
            'registration_date' => '2021-01-01',
        ]);

        Registration::create([
            'user_id' => '2',
            'training_id' => '2',
            'registration_date' => '2022-11-01',
        ]);

        Registration::create([
            'user_id' => '3',
            'training_id' => '3',
            'registration_date' => '2023-06-14',
        ]);
    }
}
