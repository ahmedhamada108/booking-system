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
        // Fetch the trip that you want to create stop points for
        $trip = Trip::find(1); // Replace with the desired trip ID

        if ($trip) {
            // Fetch the start and end stations of the trip
            $startStation = Station::find($trip->start_station_id);
            $endStation = Station::find($trip->end_station_id);

            if ($startStation && $endStation) {
                // Get all stations between the start and end stations
                $stations = Station::where('id', '>=', $startStation->id)
                                   ->where('id', '<=', $endStation->id)
                                   ->orderBy('id')
                                   ->get();

                // Loop through all combinations of start and end stations
                for ($i = 0; $i < $stations->count(); $i++) {
                    for ($j = $i + 1; $j < $stations->count(); $j++) {
                        // Create stop points for each combination
                        StopPointsTrip::create([
                            'trip_id' => $trip->id,
                            'start_station_id' => $stations[$i]->id, // Start station
                            'end_station_id' => $stations[$j]->id,   // End station
                            'available_seats' => 50,                   // Set available seats
                            'sort_order' => $j + 1,                    // Use j + 1 for sort order
                        ]);
                    }
                }
            }
        }
    }

}
