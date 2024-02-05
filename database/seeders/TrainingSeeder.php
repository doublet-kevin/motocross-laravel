<?php

namespace Database\Seeders;

use App\Models\Training;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Training::create([
            'date' => Carbon::parse('2021-01-01')->setTime(14, 0, 0)->toDateTimeString(),
            'type' => 'adulte',
            'max_participants' => '75',
            'circuit_id' => '1',
        ]);

        Training::create([
            'date' => Carbon::parse('2021-01-01')->setTime(14, 0, 0)->toDateTimeString(),
            'type' => 'enfant',
            'max_participants' => '75',
            'circuit_id' => '2',
        ]);

        Training::create([
            'date' => Carbon::parse('2021-01-01')->setTime(14, 0, 0)->toDateTimeString(),
            'type' => 'adulte',
            'number_of_places' => '45',
            'circuit_id' => '3',
        ]);
    }
}
