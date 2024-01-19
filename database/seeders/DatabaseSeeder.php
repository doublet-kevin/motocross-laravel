<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Circuit;
use Illuminate\Database\Seeder;
use Database\Seeders\RolesTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Termwind\Components\Li;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ClubSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            LicenseSeeder::class,
            CircuitSeeder::class,
            TrainingSeeder::class,
            RegistrationSeeder::class,
        ]);
    }
}
