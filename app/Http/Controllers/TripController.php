<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Setting;
use App\Models\Trip;
use App\Models\TripPassenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TripController extends Controller
{
    // public function joinTrip(Request $request)
    // {


    //     $validator = Validator::make($request->all(), [
    //         'trip_id' => 'required|integer|exists:trips,id',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['error' => 'Invalid Parameters'], 401);
    //     }

    //     $trip_id = $request->trip_id;


    //     $trip = Trip::find($trip_id);

    //     if (!$trip) {
    //         return response()->json(['message' => 'الرحلة غير موجودة'], 404);
    //     }


    //     // إضافة العميل إلى الرحلة
    //     // نحن نفترض أن العميل الذي يريد الانضمام هو المستخدم الحالي
    //     $user = Auth::user(); // الحصول على المستخدم المتصل حاليًا

    //     // تحقق إذا كان المستخدم قد انضم بالفعل إلى هذه الرحلة
    //     if ($trip->users->contains($user->id)) {
    //         return response()->json(['message' => 'أنت بالفعل عضو في هذه الرحلة'], 400);
    //     }

    //     // إضافة المستخدم إلى الرحلة
    //     $trip->users()->attach($user->id);

    //     return response()->json([
    //         'message' => 'The trip has been successfully joined ',
    //         'trip' => $trip
    //     ]);
    // }
    public function joinTrip(Request $request)
    {
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

        // تحقق إذا كان المستخدم قد انضم بالفعل
        $existingPassenger = TripPassenger::where('trip_id', $trip_id)
            ->where('client_id', $user->id)
            ->first();

        if ($existingPassenger) {
            return response()->json(['message' => 'You are already a member of this Trip الرحلة'], 400);
        }

        // إنشاء سجل جديد في TripPassenger
        TripPassenger::create(attributes: [
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


    public function addTrip(Request $request)
    {
        // التحقق من صحة البيانات
        $validated = $request->validate([
            'plate_number' => 'required|string|max:10',
            'notes' => 'nullable|string',
            'total_seats' => 'required|integer|min:1',
            'dateTime' => 'required|date',
            'source_id' => 'required|exists:cities,id',
            'destination_id' => 'required|exists:cities,id',
        ]);

        $user = Auth::user(); // الحصول على المستخدم المتصل حاليًا

        if (!$user) {
            return response()->json(['message' => 'يجب تسجيل الدخول لإضافة رحلة.'], 401);
        }

        // الحصول على المسافة بين المصدر والوجهة
        $distance = City::find($request->source_id)
            ->distances()
            ->where('city_id', $request->destination_id)
            ->first();

        if (!$distance) {
            return response()->json(['message' => 'لا توجد مسافة بين المدن المحددة.'], 400);
        }

        // المسافة بالكيلومتر
        $distanceKm = $distance->pivot->distance_km;

        // الحصول على الإعدادات من قاعدة البيانات
        $fuelPricePerLiter = Setting::where('key', 'fuel_price')->value('value');
        $fuelEfficiency = Setting::where('key', 'fuel_efficiency')->value('value');
        $maintenanceCostPerKm = Setting::where('key', 'maintenance_cost')->value('value');
        $driverProfitPerKm = Setting::where('key', 'driver_profit_per_km')->value('value');

        // التحقق من وجود الإعدادات
        if (!$fuelPricePerLiter || !$fuelEfficiency || !$maintenanceCostPerKm || !$driverProfitPerKm) {
            return response()->json(['message' => 'إعدادات التكلفة مفقودة.'], 500);
        }

        // حساب تكلفة الرحلة
        $fuelRequired = $distanceKm / $fuelEfficiency; // حساب كمية الوقود المطلوبة
        $fuelCost = $fuelRequired * $fuelPricePerLiter; // حساب تكلفة الوقود
        $maintenanceCost = $distanceKm * $maintenanceCostPerKm; // حساب تكلفة الصيانة
        $driverProfit = $distanceKm * $driverProfitPerKm; // حساب ربح السائق
        $totalCost = $fuelCost + $maintenanceCost + $driverProfit; // التكلفة الإجمالية

        // إنشاء الرحلة
        $trip = new Trip();
        $trip->plate_number = $validated['plate_number'];
        $trip->notes = $request->notes;
        $trip->price = $totalCost;
        $trip->total_seats = $validated['total_seats'];
        $trip->dateTime = $validated['dateTime'];
        $trip->driver_id = $user->id; // تعيين معرف السائق
        $trip->save();

        return response()->json([
            'message' => 'تمت إضافة الرحلة بنجاح!',
            'trip' => $trip
        ]);
    }

    /**{
    "plate_number": "ABC123",
    "notes": "This is a test trip",
    "price": 100,
    "total_seats": 4,
    "dateTime": "2024-12-01T15:00:00"
}
     */
}
