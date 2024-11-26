<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GetTripsController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('available-trips');

        // جلب الرحلات التي حالتها "نشطة" من خلال جدول TripStatus
        $trips = Trip::whereHas('TripStatus', function ($query) {
            $query->where('name', 'Avilable'); // تأكد من أن "status" هو اسم العمود الصحيح في جدول "trip_statuses"
        })->get();

        // إرجاع البيانات بصيغة JSON
        return response()->json($trips);
    }

    /*2*/
    public function getTrips(Request $request)
    {
        $this->authorize('trips');

        // Default to 0 if not provided

        // الحصول على قيمة "skip" من الطلب (إذا لم توجد، يتم تعيينها إلى 0)
        $skip = $request->input('skip', 0);

        // الحصول على قيمة "limit" من الطلب (إذا لم توجد، يتم تعيينها إلى 10)
        $limit = $request->input('limit', 10); // Default to 10 if not provided

        // الحصول على قيمة "name" من الطلب (قد تكون موجودة أو لا)
        $id = $request->input('id'); // name may or may not be provided

        // إنشاء استعلام للحصول على بيانات من جدول "Trip"
        $query = Trip::query();

        // إذا تم إرسال "name" وكانت قيمتها، نقوم بتصفية الرحلات حسب الاسم
        if ($id) {
            $query->where('id', $id);  // تأكد من أن "name" هو العمود الصحيح في قاعدة البيانات
        }

        // إذا كانت قيمة "skip" و "limit" موجودة، نطبقها على الاستعلام للحصول على عدد معين من النتائج مع تخطي بعض النتائج
        $trips = $query->skip($skip)->take($limit)->get();

        // إعادة البيانات للمستخدم على شكل JSON
        return response()->json($trips);
    }
}
