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
    public function createTrip(Request $request)
    {
        // if (auth()->user()->role->name !== 'client') {
        //     return response()->json(['error' => 'Unauthorized'], 403);
        // }
        // $this->authorize('create-trip');

        $validatedData = $request->validate([
            'source_id' => 'required|exists:cities,id',
            'destination_id' => 'required|exists:cities,id',
            'dateTime' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $source_id = $validatedData['source_id'];
        $destination_id = $validatedData['destination_id'];

        // جلب المسافة من جدول المسافات
        $distance = DB::table('city_distances')
            ->where('source_id', $source_id)
            ->where('destination_id', $destination_id)
            ->value('distance_km');

        if (!$distance) {
            return response()->json(['error' => 'Distance not found'], 404);
        }

        // جلب سعر البنزين
        $fuelPricePerLiter = DB::table(table: 'settings')->where('key', 'fuel_price_per_liter')->value('value');

        if (!$fuelPricePerLiter) {
            return response()->json(['error' => 'Fuel price not set'], 500);
        }

        // حساب تكلفة الرحلة
        $totalCost = $fuelPricePerLiter * $distance;
        $companyProfit = $totalCost * 0.1;
        $finalCost = $totalCost + $companyProfit;

        // إرجاع البيانات للعميل
        return response()->json([
            'distance_km' => $distance,
            'total_cost' => round($finalCost, 2),
            'cost_per_passenger' => round($finalCost / 4, 2), // تقسيم التكلفة على 4 ركاب (كمثال)
            'dateTime' => $validatedData['dateTime'], // عرض الوقت المرسل من العميل
        ]);
    }

    public function addTrip(Request $request)
    {
        // $this->authorize('add-trip');

        // if (auth()->user()->role->name !== 'client') {
        //     return response()->json(['error' => 'Unauthorized'], 403);
        // }

        // if (!auth()->check() || auth()->user()->role->name !== 'admin') {
        //     return response()->json(['error' => 'Unauthorized'], 403);
        // }
        

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
            'source_id' => $request->source_id,
            'destination_id' => $request->destination_id,
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
        // if (auth()->user()->role->name !== 'admin') {
        //     return response()->json(['error' => 'Unauthorized'], 403);
        // }
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
