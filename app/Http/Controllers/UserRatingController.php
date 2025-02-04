<?php

namespace App\Http\Controllers;

use App\Models\UserRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserRatingController extends Controller
{
    public function storeRating(Request $request)
    {
        // التحقق من صحة البيانات المدخلة
        $validator = Validator::make($request->all(), [
            'rated_user_id' => 'required|exists:users,id', // المستخدم الذي يتم تقييمه
            'rating_user_id' => 'required|exists:users,id', // المستخدم الذي يقوم بالتقييم'
            'rating' => 'required|numeric|min:0|max:5',

        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // التحقق إذا كان المستخدم قد قيم هذا المستخدم من قبل
        $existingRating = UserRating::where('rated_user_id', $request->rated_user_id)
            ->where('rating_user_id', $request->rating_user_id)
            ->first();

        if ($existingRating) {
            // تحديث التقييم إذا كان موجوداً
            $existingRating->rating = $request->rating;
            $existingRating->save();
        } else {
            // إضافة تقييم جديد
            UserRating::create([
                'rated_user_id' => $request->rated_user_id,
                'rating_user_id' => $request->rating_user_id,
                'rating' => $request->rating,
                'status' => 'hidden', // التقييم في البداية سيكون مخفياً
            ]);
        }

        // حساب المتوسط الحسابي للتقييمات
        $averageRating = UserRating::where('rated_user_id', $request->rated_user_id)
            ->where('status', 'visible') // حساب المتوسط للتقييمات التي حالتها visible فقط
            ->avg('rating');

        // إرجاع استجابة مع المتوسط الحسابي
        return response()->json([
            'message' => 'تم حفظ التقييم بنجاح',
            'average_rating' => $averageRating,
        ]);
    }

    public function getAverageRating(Request $request)
    {
        $request->validate([
            'rated_user_id' => 'required|exists:users,id',
        ]);

        $rated_user_id = $request->rated_user_id;

        // التحقق إذا كان المستخدم موجوداً
        $userExists = \App\Models\User::find($rated_user_id);

        if (!$userExists) {
            return response()->json(['error' => 'المستخدم غير موجود'], 404);
        }

        // حساب المتوسط الحسابي للتقييمات
        $averageRating = UserRating::where('rated_user_id', $rated_user_id)
            ->where('status', 'visible') // حساب المتوسط للتقييمات التي حالتها visible فقط
            ->avg('rating');

        // إرجاع المتوسط الحسابي
        return response()->json([
            'rated_user_id' => $rated_user_id,
            'average_rating' => $averageRating,
        ]);
    }
}
