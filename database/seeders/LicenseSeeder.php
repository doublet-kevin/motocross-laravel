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
                'license_number' => '6155416814651351',
                'associate_email' => 'test@test.test',
            ]
        );

        License::create(
            [
                'license_number' => '6157416844661321',
                'associate_email' => 'testt@test.test',
                'user_id' => '2',
            ]
        );

        License::create(
            [
                'license_number' => '415773416894661421',
                'associate_email' => 'test@user.test',
            ]
        );
    }
}
