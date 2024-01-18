<?php

namespace Database\Seeders;

use App\Models\Circuit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CircuitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Circuit::create([
            'name' => 'Circuit 1',
            'id_club' => '1',
        ]);
    }
}
