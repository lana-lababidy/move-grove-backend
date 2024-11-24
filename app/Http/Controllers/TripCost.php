<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class TripCost extends Controller
{
    public function costTrip(Request $request)
    {
        $request->validate([
            'source_id' => 'required|exists:cities,id',
            'destination_id' => 'required|exists:cities,id',
        ]);
        

        // الحصول على معرف المدن من الطلب
        $sourceId = $request->input('source_id');
        $destinationId = $request->input('destination_id');

        // جلب المدينة المصدر
        $sourceCity = City::find($sourceId);

        // التحقق من وجود المدينة المصدر
        if (!$sourceCity) {
            return response()->json(['error' => 'City not found'], 404);
        }

        // الحصول على المسافة بين المدن من جدول city_distances
        $distance = $sourceCity
                        ->distances()
                        ->where('destination_id', $destinationId)
                        ->first();

        // إذا كانت المسافة غير موجودة
        if (!$distance) {
            return response()->json(['error' => 'Distance between cities not found'], 404);
        }

        // المسافة بالكيلومتر
        $distanceKm = $distance->pivot->distance_km;

        // تحديد سعر اللتر (يمكنك تعديله أو جلبه من قاعدة البيانات)
        $fuelPricePerLiter = 1.5; // افترض 1.5 لكل لتر

        // تحديد معدل استهلاك الوقود: 2.1 كم لكل لتر
        $litersRequired = $distanceKm / 2.1;

        // حساب تكلفة الوقود
        $totalFuelCost = $litersRequired * $fuelPricePerLiter;

        // إضافة ربح الشركة (افترض ربح 20%)
        $companyProfit = 0.20 * $totalFuelCost;

        // حساب التكلفة الإجمالية
        $totalCost = $totalFuelCost + $companyProfit;

        // إرجاع التكلفة مع تفاصيل الرحلة
        return response()->json([
            'source_id' => $sourceId,
            'destination_id' => $destinationId,
            'distance_km' => $distanceKm,
            'liters_required' => $litersRequired,
            'fuel_cost' => $totalFuelCost,
            'company_profit' => $companyProfit,
            'total_cost' => $totalCost,
        ]);
    }
}
