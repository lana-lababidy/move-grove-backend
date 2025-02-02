<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\User;
use Carbon\Carbon;

use 
Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrippSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        // التأكد من أن هناك سيارات موجودة في قاعدة البيانات
        $carId = Car::first() ? Car::first()->id : null; // إذا كانت هناك سيارات، اختر أول واحدة، وإذا لا يوجد اختر null

        // التأكد من أن هناك سائقين موجودين في قاعدة البيانات
        $driver = User::where('role_id', 1)->first(); // البحث عن أول سائق
        $driverId = $driver ? $driver->id : null; // إذا كان هناك سائق، اختر الـ id، وإذا لا يوجد اختر null

        // إذا لم يكن هناك سيارة أو سائق، لا تتابع العملية
        if (!$carId || !$driverId) {
            echo "لا يوجد سائق أو سيارة لإضافة الرحلة.\n";
            return;
        }

        // إدخال بيانات للرحلات
        DB::table('trips')->insert([
            'status_id'=>'1',
            'total_seats' => 4,
            'price' => 150.00,
            'dateTime' => Carbon::now()->addDays(2), // تاريخ الرحلة بعد يومين من الآن
            'notes' => 'رحلة من دمشق إلى حلب',
            'driver_id' => $driverId, // إضافة معرف السائق
            'car_id' => 1, // تأكد من إضافة car_id
        ]);
    }
}