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
        // $this->authorize('add-car'); 
        // if ($request->user()->role !== 'driver') {
        //     return response()->json(['error' => 'Unauthorized'], 403); // رد غير مصرح به إذا لم يكن سائق
        // }

        // // تحقق من الصلاحية (أضف الكود الخاص بالتحقق هنا إذا لزم الأمر)
        // if (!$request->user()->can('add car')) {
        //     return response()->json(['error' => 'Unauthorized'], 403); // تحقق من الصلاحية لإضافة سيارة
        // }
        $request->validate([
            'fullname' => 'required|string|max:255',
            'gender' => 'required|string|in:male,female', // Only 'male' or 'female' are allowed
        ]);
        
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|string|max:255',
        // ]);


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

    public function editCar(Request $request, $id)
    {
        $this->authorize('edit-car'); 
        
        if (!$request->user()->can('edit car')) {
            return response()->json(['error' => 'Unauthorized'], 403); // تحقق من الصلاحية لتعديل السيارة
        }
    
        // التحقق من أن السيارة موجودة
        $car = Car::find($id);
        if (!$car) {
            return response()->json(['error' => 'Car not found'], 404); // إذا لم يتم العثور على السيارة
        }
    
        // // التحقق من أن السيارة تعود للسائق الحالي
        // if ($car->user_id !== $request->user()->id) {
        //     return response()->json(['error' => 'You can only edit your own cars'], 403); // إذا كانت السيارة ليست ملكًا للسائق
        // }
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        $car->name = $request['name'];
        $car->save();
    
        return response()->json([
            'id' => $car->id,
            'className' => 'Cars',
            'name' => $car->name,
           
        ], 200);
    }
    
    public function deleteCar($value)
    {
        $this->authorize('delete-car'); 


        $car = Car::find($value);

        if (!$car) {
            $car = Car::where('name', $value)->first();
        }

        if ($car) {
            $car->delete();
            return response()->json(['message' => ' Car deleted successfully']);
        } else {
            return response()->json(['message' => 'the car not found']);
        }
    }
}
