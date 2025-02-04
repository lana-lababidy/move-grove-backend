<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Setting;
use App\Models\Trip;
use App\Models\TripPassenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TripController extends Controller
{
    public function addTrip(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'source_id' => 'required|exists:cities,id',
            'destination_id' => 'required|exists:cities,id',
            'dateTime' => 'required|date_format:Y-m-d H:i:s',
            'total_seats' => 'required|integer',
            'notes' => 'string',
            'car_id' => 'required|integer',

        ]);



        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }



        $distance_km = DB::table('city_distances')->where('source_id', $request->source_id)->where('destination_id', $request->destination_id)->value('distance_km');


        $fuel_price_per_liter = DB::table('settings')->where('id', '1')->value('value');

        $minPrice = (($fuel_price_per_liter * 20) * $distance_km) / 200;




        // إنشاء الرحلة
        $trip = Trip::create([
            'user_id' => $request->user_id,
            'source' => City::find($request->source_id)->name, // Convert ID to name
            'destination' => City::find($request->destination_id)->name,

            'dateTime' => $request->dateTime,
            'total_seats' => $request->total_seats,
            'price' => $minPrice,
            'notes' => '',
            'car_id' => $request->car_id,
            'status_id' => DB::table('trip_statuses')->where('code', '2')->value('id'),
        ]);

        // الرد على العميل
        return response()->json([
            'message' => 'Trip created successfully, waiting for approval.',
            'data' => $trip,
        ]);
    }

    public function getTripByUser(Request $request)
    {

        if ($request->has('id')) {
            $trip = Trip::find($request->id);

            if (!$trip) {
                return response()->json(['message' => 'Trip not found'], 404);
            }

            return response()->json($trip);
        } else {
            // If no ID is provided, fetch all trips for the user
            $userTrips = Trip::where('user_id', auth()->id())->get();

            return response()->json($userTrips);
        }
    }
}
