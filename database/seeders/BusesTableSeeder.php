<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('buses')->insert([
            ['bus_name' => 'Bus A', 'bus_number' => 'A123', 'total_seats' => 12],
            ['bus_name' => 'Bus B', 'bus_number' => 'B456', 'total_seats' => 12],
            ['bus_name' => 'Bus C', 'bus_number' => 'C789', 'total_seats' => 12],
            ['bus_name' => 'Bus D', 'bus_number' => 'D101', 'total_seats' => 12],
            ['bus_name' => 'Bus E', 'bus_number' => 'E112', 'total_seats' => 12],
        ]);
    }
}
