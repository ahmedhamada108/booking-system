<?php

use App\Models\Trip;
use App\Models\Seats;
use App\Models\Booking;
use App\Models\Station;
use Illuminate\Http\Request;
use App\Models\StopPointsTrip;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\StationController;



Route::post('/login', [AuthController::class, 'login']);

Route::get('bus/stations', [StationController::class, 'index']);

Route::get('bus/trips', [TripController::class, 'index']);

Route::get('bus/seats', [SeatController::class, 'index']);

Route::post('bus/book-seats', [BookingController::class, 'bookSeats'])->middleware('auth.user');
