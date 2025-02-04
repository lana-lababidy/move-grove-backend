<?php

namespace App\Http\Controllers;

use App\Models\Trip;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ToReuseController extends Controller
{
    public function getTripsStatusById($id)
    {

        // مين بدو يعملا
        if (Auth::check() && Auth::user()->id == 2) {
            $trip = Trip::find($id);
            if (!$trip) {
                return response()->json([
                    'message' => 'Trip not found.'
                ], 404);
            }

            return response()->json([
                'trip_id' => $trip->id,
                'status' => $trip->status
            ]);
        } else {
            return response()->json([
                'message' => 'Acsess Denied.'
            ], 404);
        }
    }

    public function getTripsPassengerStatusById($id, $passengerId)
    {
        $trip = Trip::find($id);
    
        if (!$trip) {
            return response()->json([
                'message' => 'Trip not found.'
            ], 404);
        }
    
        // البحث عن الراكب باستخدام wherePivot
        $passenger = $trip->passengers()
                          ->wherePivot('client_id', $passengerId)
                          ->first();
    
        if (!$passenger) {
            return response()->json([
                'message' => 'Passenger not found for this trip.'
            ], 404);
        }
    
        return response()->json([
            'trip_id' => $trip->id,
            'passenger_id' => $passenger->id,
            'status' => $passenger->pivot->status, // استخدام `pivot` لجلب `status`
            'source_id' => $passenger->pivot->source_id,
            'destination_id' => $passenger->pivot->destination_id
        ]);
    }
}    