<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function addCity(Request $request)
    {


        $city = new City();
        $city->name = $request->name;
        $city->save();

        return response()->json([
            'id' => $city->id,
            'className' => 'city',
            'name' => $city->name,
        ], 201);
    }


public function getCities()
    {
        try {
            // Retrieve all cities from the database
            $cities = City::all();

            // Return the data as a JSON response
            return response()->json([
                'success' => true,
                'data' => $cities
            ], 200);
        } catch (\Exception $e) {
            // Handle errors
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch cities.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
