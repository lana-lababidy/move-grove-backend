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
        // التحقق من المدخلات
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'mobile_number' => 'required|max:10',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid Parameters'], 401);
        }

        // البحث عن المستخدم بناءً على اسم المستخدم ورقم الهاتف
        $user = User::where('username', $request->username)
                    ->where('mobile_number', $request->mobile_number)
                    ->first();

        //  التحقق أولًا إذا كان المستخدم موجودًا قبل الوصول إلى role
        if (!$user) {
            return response()->json(['message' => 'Invalid username or mobile number'], 401);
        }

        //  تأكد من أن علاقة `role` موجودة في `User`:
        if (!$user->role || $user->role->name !== 'admin') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        // إنشاء Access Token
        // $token = $user->createToken('AdminAccessToken')->accessToken;
        $token = $user->createToken('AdminAccessToken')->plainTextToken;

        return response()->json([
            'data' => $user,
            'token' => $token
        ]);
    }
}

