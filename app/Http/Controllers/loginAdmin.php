<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class loginAdmin extends Controller
{
    public function loginAdmin(Request $request)
    {
        //  التحقق من صحة البيانات 
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'mobile_number' => 'required|max:10',
        ]);

    
        //  البحث عن المستخدم بناءً على الاسم 
        //البحث عن المستخدم بشكل يدوي واحد واحد
        $user = User::where('username', $request->username)->first();

        // إذا كان المستخدم غير موجود أو كلمة المرور غير صحيحة، يتم إرجاع رسالة خطأ
        //التحقق يدوي
        if (!$user) {
            return response()->json(['message' => 'Invalid username'], 401);
        }

        //  إذا كانت البيانات صح بأنشئ (token) جديد 
        $token = $user->createToken('AdminAccessToken')->accessToken;

        return response()->json([
            'data' => $user,
            'token' => $token
        ]);
    }
}
