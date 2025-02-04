<?php

namespace App\Http\Controllers;
use App\Models\Trip;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TripUser;

class TripsUser extends Controller
{
    public function joinTrip(Request $request)
    {
        // $this->authorize(ability: 'join-trip');

        $validator = Validator::make($request->all(), [
            'trip_id' => 'required|integer|exists:trips,id',
            'source_id' => 'required|integer|exists:cities,id',
            'destination_id' => 'required|integer|exists:cities,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid Parameters'], 401);
        }

        $trip_id = $request->trip_id;

        $trip = Trip::find($trip_id);
        if (!$trip) {
            return response()->json(['message' => 'The Trip Does not Exist'], 404);
        }

        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        
        
        // تحقق إذا كان المستخدم قد انضم بالفعل
        $existingPassenger = TripUser::where('trip_id', $trip_id)
            ->where('client_id', $user->id)
            ->first();

        if ($existingPassenger) {
            return response()->json(['message' => 'You are already a member of this Trip الرحلة'], 400);
        }

        // إنشاء سجل جديد في TripPassenger
        TripUser::create(attributes: [
            'client_id' => $user->id,
            'trip_id' => $trip_id,
            'source_id' => $request->source_id,
            'destination_id' => $request->destination_id,
        ]);

        return response()->json([
            'message' => 'Trip Joined Successfully',
            'trip' => $trip
        ]);
    }
}
