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
        $buses = Bus::all();

        foreach ($buses as $bus) {
            for ($i = 1; $i <= 50; $i++) {
                Seats::create([
                    'bus_id' => $bus->id,
                    'seat_number' => $i,
                    'status' => 'available',
                ]);
            }
        }
    }
}
