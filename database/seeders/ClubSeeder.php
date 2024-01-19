<?php

namespace Database\Seeders;

use App\Models\Club;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Club::create(
            [
                'name' => "Club motocross Auribail",
                'region' => 'Occitanie',
                'city' => 'Toulouse',
                'postal_code' => '31000',
            ]
        );
    }
}
