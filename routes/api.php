<?php

use App\Models\Seats;
use App\Models\Trip;
use App\Models\Booking;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\StopPointsTrip;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth.user');

Route::post('/login', [AuthController::class, 'login']);
Route::get('stations',function(){
    $stations = Station::all();
    return $stations;
});

Route::get('trips', function () {
    $trips = Trip::with(['startStation', 'endStation', 'stopPoints.startStation', 'stopPoints.endStation'])->get();

    return response()->json($trips->map(function ($trip) {
        return [
            'id' => $trip->id,
            'bus_id' => $trip->bus_id,
            'start_time' => $trip->start_time,
            'arrival_time' => $trip->arrival_time,
            'start_station' => $trip->startStation ? $trip->startStation->name : null,
            'end_station' => $trip->endStation ? $trip->endStation->name : null,
            'stop_points' => $trip->stopPoints->map(function ($stop) {
                return [
                    'id' => $stop->id,
                    'trip_id' => $stop->trip_id,
                    'available_seats' => $stop->available_seats,
                    'start_station_name' => $stop->startStation ? $stop->startStation->name : null,
                    'end_station_name' => $stop->endStation ? $stop->endStation->name : null,
                ];
            }),
        ];
    }));
});


Route::get('seats',function(Request $request){
    
    // Validate incoming request data
    $validated = $request->validate([
        'trip_id' => 'required|exists:trips,id',
        'start_station_id' => 'required|exists:stations,id',
        'end_station_id' => 'required|exists:stations,id',
        'bus_id' => 'required|exists:buses,id'
    ]);

    // Get the trip details to find the start and end station IDs
    $trip = Trip::find($validated['trip_id']);
    
    // Get booked seats for the specific trip
    $bookedSeats = Booking::where('trip_id', $trip->id)
        ->where('start_station_id', $validated['start_station_id'])
        ->where('end_station_id', $validated['end_station_id'])
        ->pluck('seat_id');

    // Get all available seats for the specific bus
    $availableSeats = Seats::where('bus_id', $validated['bus_id'])
        ->where('status', 'available')
        ->whereNotIn('id', $bookedSeats)
        ->get(['seat_number']);

    // Return the list of available seat numbers
    return response()->json([
        'available_seats' => $availableSeats
    ], 200);
});


