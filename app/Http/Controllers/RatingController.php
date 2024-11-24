<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'ratingable_id' => 'required|exists:trips,id', 
            'ratingable_type' => 'required|string|in:App\Models\Trip,App\Models\User',  
            'rating' => 'required|integer|min:1|max:5',  
        ]);

        // Check if the user has already rated the item
        $existingRating = Rating::where('ratingable_id', $request->ratingable_id)
            ->where('ratingable_type', $request->ratingable_type)
            ->where('user_id', auth()->id())  // Get the authenticated user's ID
            ->first(); 
             // Retrieve the first matching rating

        if ($existingRating) {
            return response()->json(['message' => 'You have already rated this item.'], 400);
        } else {
            $rating = Rating::create([
                'ratingable_id' => $request->ratingable_id,  
                // ID of the item (trip or user)
                'ratingable_type' => $request->ratingable_type, 
                 // Type of the item (Trip or User)
                'rating' => $request->rating,  
                'user_id' => auth()->id(),  // The ID of the user who is rating
            ]);

            // Return a thank you message along with the created rating
            return response()->json(['message' => 'Thanks For Your Rating', 'rating' => $rating], 201);
        }
    }

    public function showWithAverage($ratingableId, $ratingableType)
    {
        $ratings = Rating::where('ratingable_id', $ratingableId)
            ->where('ratingable_type', $ratingableType)
            ->get();

        $averageRating = Rating::where('ratingable_id', $ratingableId)
            ->where('ratingable_type', $ratingableType)
            ->avg('rating');

        return response()->json([
            'ratings' => $ratings,
            'average_rating' => $averageRating
        ]);
    }
}

/* في داعي لهدول
// التحقق من صلاحيات المستخدم
        $user = auth()->user();
        
        // العثور على الرحلة
        $trip = Trip::findOrFail($tripId);
        
        // تحديد نوع التقييم بناءً على الدور
        if ($user->hasRole('driver')) {
            $ratingableType = 'App\Models\Driver';  // إذا كان السائق هو الذي سيُقيم
            $userId = $trip->driver_id;  // السائق هو المستخدم الذي سيُقيّم
        } elseif ($user->hasRole('passenger')) {
            $ratingableType = 'App\Models\Passenger';  // إذا كان الراكب هو الذي سيُقيم
            $userId = $trip->passenger_id;  // الراكب هو المستخدم الذي سيُقيّم
        } else {
            return response()->json(['error' => 'Unauthorized'], 403);  // في حال كان المستخدم ليس سائقًا أو راكبًا
        }*/