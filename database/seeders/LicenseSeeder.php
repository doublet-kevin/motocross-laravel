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
                'id_user' => '1',
            ]
        );

        License::create(
            [
                'license_number' => '6157416844661321',
                'id_user' => '2',
            ]
        );

        License::create(
            [
                'license_number' => '415773416894661421',
                'id_user' => '3',
            ]
        );
    }
}
