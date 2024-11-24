<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    /**
      public function __construct()
{
    // التأكد من أن المستخدم هو SuperAdmin فقط
    $this->middleware('role:SuperAdmin'); // تحقق من أن الدور هو SuperAdmin
}

public function __construct()
{
    // التأكد من أن المستخدم هو SuperAdmin فقط
    $this->middleware('role:Driver'); // تحقق من أن الدور هو SuperAdmin
}
    public function __construct()
{
    // التأكد من أن المستخدم هو SuperAdmin فقط
    $this->middleware('role:Client'); // تحقق من أن الدور هو SuperAdmin
}

Route::get('/manage-users', [AdminController::class, 'manageUsers']);


الراوتااااات 

Route::middleware(['role:SuperAdmin'])->group(function() {
    Route::get('/manage-users', [AdminController::class, 'manageUsers']);
});

Route::middleware(['role:Driver'])->group(function() {
    Route::get('/manage-users', [AdminController::class, 'manageUsers']);
});

Route::middleware(['permission:create trips'])->group(function() {
    Route::get('/create-trip', [DriverController::class, 'createTrip']);
});


Route::middleware(['role:SuperAdmin', 'role:Driver', 'permission:create trips'])->group(function() {
    Route::get('/create-trip', [DriverController::class, 'createTrip']);
});


use Illuminate\Support\Facades\Route;

Route::middleware(['role:SuperAdmin', 'role:Driver'])->group(function() {
    Route::get('/create-trip', [DriverController::class, 'createTrip']);
});


     */

}