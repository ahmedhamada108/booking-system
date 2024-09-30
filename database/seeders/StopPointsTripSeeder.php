<?php

namespace Database\Seeders;

use App\Models\Trip;
use App\Models\Station;
use App\Models\StopPointsTrip;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StopPointsTripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $trip = Trip::first(); 
        $stations = Station::take(3)->get(); 

        if ($trip && $stations->count() > 1) {
            for ($i = 0; $i < $stations->count() - 1; $i++) {
                StopPointsTrip::create([
                    'trip_id' => $trip->id,
                    'start_station_id' => $stations[$i]->id, 
                    'end_station_id' => $stations[$i + 1]->id, 
                    'available_seats' => 50,
                ]);
            }
        }
    }
}
