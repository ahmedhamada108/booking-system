<?php

namespace App\Http\Requests;

use App\Models\Seats;
use Illuminate\Foundation\Http\FormRequest;

class BookSeatRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Add your authorization logic if necessary
    }

    public function rules()
    {
        return [
            'trip_id' => 'required|exists:trips,id',
            'start_station_id' => 'required|exists:stations,id',
            'end_station_id' => 'required|exists:stations,id',
            'seat_id' => 'required|array',
            'seat_id.*' => [
                'integer',
                'exists:seats,id',
                function ($attribute, $value, $fail) {
                    $seat = Seats::find($value);
                    if ($seat && $seat->status !== 'available') {
                        $fail("The seat number {$seat->seat_number} is not available.");
                    }
                },
            ],
            'quantity' => 'required|integer|min:1',
        ];
    }
}
