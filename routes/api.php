<?php

use App\Http\Controllers\AddCarController;
use App\Http\Controllers\AddCity;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\loginAdmin;
use App\Http\Controllers\TripUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\generateOtp;
use App\Http\Controllers\ContinueWithMobile;
use App\Http\Controllers\GetTripsController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RatingSysController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\TripsDetailsController;
use App\Http\Controllers\ToReuseController;
use App\Http\Controllers\TripCost;
use App\Http\Controllers\TripsUser;
use App\Http\Controllers\UserRatingController;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Laravel\Passport\Http\Controllers\AccessTokenController;


Route::middleware('auth:api')->get('/user', function (Request $request) {

    return $request->user();
});

/*DONE */
Route::post('/login', [AccessTokenController::class, 'issueToken'])
    ->middleware('throttle:60,1')
    ->name('passport.token');

Route::post('/login-admin', [loginAdmin::class, 'loginAdmin']);

Route::post('/generate-otp', [generateOtp::class, 'generateOtp']);

Route::post('/cwm', [continueWithMobile::class, 'continueWithMobile']);

Route::post('/add-car', [CarController::class, 'addCar']);

Route::post('/add-trip', [TripController::class, 'addTrip']);

Route::post('/add-city', [CityController::class, 'addCity']);

Route::get('/get-cars', [CarController::class, 'getCars']);

Route::get('/get-trips', [GetTripsController::class, 'getTrips']);

Route::get('/get-Trip-ByUser', [TripController::class, 'getTripByUser']);

Route::get('/cost-trip', [TripCost::class, 'costTrip']);

Route::post('/ratings-trip', [RatingSysController::class, 'storeRating']);

Route::get('/get-rating-average', [RatingSysController::class, 'getAverageRating']);

Route::get('/trips-details', [TripsDetailsController::class, 'show']);

Route::get('/trips-status/{id}', [ToReuseController::class, 'getTripsStatusById']); //شغال بس مو منطقي

Route::post('/ratings-user', [UserRatingController::class, 'storeRating']);

Route::get('/user-ratings-average', [UserRatingController::class, 'getAverageRating']);

// //مشكلة
Route::get('/avilable-trips', action: [GetTripsController::class, 'index']);

Route::get('/trips-passengers/{trip_id}/{passenger_id}', [ToReuseController::class, 'getTripsPassengerStatusById']);

Route::post('/join-trip', [TripsUser::class, 'joinTrip']);

//6