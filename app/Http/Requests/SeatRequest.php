<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeatRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return [
            'trip_id' => 'required|exists:trips,id',
            'start_station_id' => 'required|exists:stations,id',
            'end_station_id' => 'required|exists:stations,id',
        ];
    }
}
