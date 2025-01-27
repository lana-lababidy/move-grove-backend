<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TripCost extends Controller
{
    public function costTrip(Request $request)
    {  // التحقق من البيانات
        $validator = Validator::make($request->all(), [
            'source_id' => 'required|exists:cities,id',
            'destination_id' => 'required|exists:cities,id',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
    
        // تعيين القيم من الطلب
        $source_id = $request->source_id;
        $destination_id = $request->destination_id;
    
        // جلب أسماء المدن بناءً على المعرفات
        $source_city = DB::table('cities')->where('id', $source_id)->value('name');
        $destination_city = DB::table('cities')->where('id', $destination_id)->value('name');
    
        // حساب المسافة والتكلفة
        $distance_km = DB::table('city_distances')
            ->where('source_id', $source_id)
            ->where('destination_id', $destination_id)
            ->value('distance_km');
    
        $fuel_price_per_liter = DB::table('settings')->where('id', '1')->value('value');
        $minPrice = (($fuel_price_per_liter * 20) * $distance_km) / 200;
    
        // إرجاع الاستجابة مع الأسماء
        return response()->json([
            'source_city' => $source_city,
            'destination_city' => $destination_city,
            'distance_km' => $distance_km,
            'minPrice' => $minPrice,
        ]);
    }
}