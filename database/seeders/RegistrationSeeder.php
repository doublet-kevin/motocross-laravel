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
            'id_user' => '1',
            'id_training' => '1',
        ]);

        Registration::create([
            'id_user' => '2',
            'id_training' => '2',
        ]);

        Registration::create([
            'id_user' => '3',
            'id_training' => '3',
        ]);
    }
}
