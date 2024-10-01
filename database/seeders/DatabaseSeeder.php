<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            StationsTableSeeder::class,
            BusesTableSeeder::class,
            SeatsTableSeeder::class,
            TripSeeder::class,
            StopPointsTripSeeder::class,
        ]);
        User::create([
            'name' => 'Jane Smith',
            'email' => 'admin1@admin.com',
            'password' => Hash::make('password'), 
        ]);
    }
}
