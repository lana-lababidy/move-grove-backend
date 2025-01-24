<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    public function addCar(Request $request)
    {
        // حفظ البيانات في قاعدة البيانات
        $car = new Car();
        $car->name = $request['name'];
        $car->save();

        return response()->json([
            'id' => $car->id,
            'className' => 'Cars',
            'name' => $car->name,
        ], 201);
    }
    

    public function getCars()
    {
        try {
            // Fetch all cars from the database
            $cars = Car::all();

            // Return the cars as a JSON response
            return response()->json([
                'success' => true,
                'data' => $cars
            ], 200);
        } catch (\Exception $e) {
            // Handle any errors
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch cars.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}