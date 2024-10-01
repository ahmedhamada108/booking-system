<?php

namespace Database\Seeders;

use App\Models\Bus;
use App\Models\Seats;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SeatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $buses = [1, 2, 3]; // List of bus IDs
        $totalSeats = 50; // Total number of seats per bus
    
        foreach ($buses as $busId) {
            for ($i = 1; $i <= $totalSeats; $i++) {
                Seats::create([
                    'bus_id' => $busId,
                    'seat_number' => rand(500, 50000),
                    'status' => 'available'
                ]);
            }
        }
    }
    
}
