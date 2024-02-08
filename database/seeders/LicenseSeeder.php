<?php

namespace Database\Seeders;

use App\Models\License;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LicenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        License::create(
            [
                'license_number' => 61554168146,
                'associate_email' => 'test@test.test',
                'user_id' => '1',
            ]
        );

        License::create(
            [
                'license_number' => 416844661321,
                'associate_email' => 'testt@test.test',
                'user_id' => '2',
            ]
        );

        License::create(
            [
                'license_number' => 4157734168946,
                'associate_email' => 'test@user.test',
            ]
        );

        License::factory()->count(30)->create();
    }
}
