<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Bus;
use App\Models\Trip;
use App\Models\Station;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $bus = Bus::first(); 
        $startStation = Station::first(); 
        $endStation = Station::skip(3)->first();
        
        if ($bus && $startStation && $endStation) {
            Trip::create([
                'bus_id' => $bus->id,
                'start_station_id' => $startStation->id,
                'end_station_id' => $endStation->id,
                'start_time' => Carbon::now(),
                'arrival_time' => Carbon::now()->addHours(4),
            ]);
        }
    }
}
