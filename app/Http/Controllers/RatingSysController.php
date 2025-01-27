<?php

namespace App\Http\Controllers;

use App\Models\RattingSys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RatingSysController extends Controller
{
    public function storeRating(Request $request)
    {
        // التحقق من صحة البيانات المدخلة
        $validator = Validator::make($request->all(), [
            'trip_id' => 'required|exists:trips,id',
            'user_id' => 'required|exists:users,id',
            'rating' => 'required|numeric|min:0|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // التحقق إذا كان المستخدم قد قيم هذه الرحلة من قبل
        $existingRating = RattingSys::where('trip_id', $request->trip_id)
            ->where('user_id', $request->user_id)
            ->first();

        if ($existingRating) {
            // تحديث التقييم إذا كان موجوداً
            $existingRating->rating = $request->rating;
            $existingRating->save();
        } else {
            // إضافة تقييم جديد
            RattingSys::create([
                'trip_id' => $request->trip_id,
                'user_id' => $request->user_id,
                'rating' => $request->rating,
                'status' => 'hidden', // التقييم في البداية سيكون مخفياً، يمكن تغييره حسب الحاجة
            ]);
        }

        // حساب المتوسط الحسابي للتقييمات
        $averageRating = RattingSys::where('trip_id', $request->trip_id)
            ->where('status', 'visible') // حساب المتوسط للتقييمات التي حالتها visible فقط
            ->avg('rating');

        // إرجاع استجابة مع المتوسط الحسابي
        return response()->json([
            'message' => 'تم حفظ التقييم بنجاح',
            'average_rating' => $averageRating,
            // إضافة المتوسط الحسابي للتقييمات
        ]);
    }

    public function getAverageRating(Request $request)
    {
        // return response()->json(["يببببب"]);

        $request->validate([
            'trip_id' => 'required|exists:trips,id',
        ]);

        $trip_id = $request->trip_id;

        // التحقق إذا كانت الرحلة موجودة
        $tripExists = \App\Models\Trip::find($trip_id);

        if (!$tripExists) {
            return response()->json(['error' => 'الرحلة غير موجودة'], 404);
        }

        // حساب المتوسط الحسابي للتقييمات
        $averageRating = RattingSys::where('trip_id', $trip_id)
            ->where('status', 'visible') // حساب المتوسط للتقييمات التي حالتها visible فقط
            ->avg('rating');

        // إرجاع المتوسط الحسابي
        return response()->json([
            'trip_id' => $trip_id,
            'average_rating' => $averageRating,
        ]);
    }
}
