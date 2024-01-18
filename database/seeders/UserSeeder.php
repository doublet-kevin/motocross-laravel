<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('users')->insert([
        //     'firstname' => Str::random(10),
        //     'lastname' => Str::random(10),
        //     'region' => Str::random(10),
        //     'city' => Str::random(10),
        //     'postal_code' => Str::random(10),
        //     'birth_date' => CarbonPeriod::between('1980-01-01', '2010-12-31'),
        //     'id_role' => Str::random(10),
        //     'email' => Str::random(10) . '@example.com',
        //     'password' => Hash::make('password'),
        // ]);

        User::create([
            'firstname' => 'John',
            'lastname' => 'Doe',
            'region' => 'Occitanie',
            'city' => 'Toulouse',
            'postal_code' => '31000',
            'birth_date' => '1980-01-01',
            'id_role' => '1',
            'id_club' => '1',
            'email' => 'test@test.test',
            'password' => Hash::make('testtest'),
        ]);
    }
}
