<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UpdateUserInfo extends Controller
{

    public function updateUserInfo(Request $request)
    {
        // Retrieve the user based on the session token in headers
        $user = Auth::user();
        // Check if the user is authenticated
        if (!$user || !($user instanceof User)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255',
            'gender' => 'required|string|in:male,female',
        ]);

        // Update user information
        $user->fullname = $request['fullname'];
        $user->gender = $request['gender'];
        $user->save();

        return response()->json([
            'message' => 'User info updated successfully',
            'data' => $user,
        ], 200);
    }
}
