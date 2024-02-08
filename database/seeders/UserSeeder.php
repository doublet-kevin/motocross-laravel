<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Database\Factories\UserWithLicenseFactory;
use Database\Factories\LicenseFactory;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'firstname' => 'John',
            'lastname' => 'Doe',
            'region' => 'Occitanie',
            'city' => 'Toulouse',
            'postal_code' => '31000',
            'birth_date' => '1980-01-01',
            'role_id' => '2',
            'club_id' => '1',
            'email' => 'test@test.test',
            'password' => Hash::make('testtest'),
        ]);

        User::create([
            'firstname' => 'James',
            'lastname' => 'Bond',
            'region' => 'Bretagne',
            'city' => 'Rennes',
            'postal_code' => '35000',
            'birth_date' => '1998-04-01',
            'role_id' => '1',
            'club_id' => '1',
            'email' => 'testt@test.test',
            'password' => Hash::make('testttest'),
        ]);

        User::create([
            'firstname' => 'Luffy',
            'lastname' => 'Mugiwara',
            'region' => 'Île-de-France',
            'city' => 'Asnières-sur-Seine',
            'postal_code' => '92600',
            'birth_date' => '1967-08-16',
            'role_id' => '1',
            'club_id' => '1',
            'email' => 'testtt@test.test',
            'password' => Hash::make('testtttest'),
        ]);

        //User with License
        $usersWithLicense = User::factory()->count(10)->create();
        foreach ($usersWithLicense as $user) {
            $license = LicenseFactory::new()->create(['user_id' => $user->id]);
            $user->update(['license_number' => $license->license_number]);
        }

        //User without License
        User::factory()->count(10)->create();
    }
}
