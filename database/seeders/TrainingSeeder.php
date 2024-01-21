<?php

namespace Database\Seeders;

use App\Models\Training;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Training::create([
            'date' => '2021-01-01',
            'type' => 'adulte',
            'number_of_places' => '10',
            'circuit_id' => '1',
        ]);

        Training::create([
            'date' => '2022-11-01',
            'type' => 'enfant',
            'number_of_places' => '64',
            'circuit_id' => '2',
        ]);

        Training::create([
            'date' => '2023-06-14',
            'type' => 'adulte',
            'number_of_places' => '45',
            'circuit_id' => '3',
        ]);
    }
}
