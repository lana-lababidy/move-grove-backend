<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // التأكد من وجود الرحلة في جدول trips
        if (!DB::table('trips')->where('id', 1)->exists()) {
            DB::table('trips')->insert([
                'id' => 1,
                'destination' => 'Destination Name', // قم بتعديل الحقول حسب الحاجة
                'source' => 'Source Name',
                'dateTime' => now(),
                'price' => 100,
                'total_seats' => 4,
                'notes' => 'Sample trip',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // التأكد من وجود المستخدمين في جدول users
        $users = [1, 2, 3, 4]; // المستخدمين الذين سيتم إدخالهم
        foreach ($users as $userId) {
            if (!DB::table('users')->where('id', $userId)->exists()) {
                DB::table('users')->insert([
                    'id' => $userId,
                    'username' => 'user' . $userId,
                    'gender' => 'male', // قم بتعديل حسب الحاجة
                    'mobile_number' => '123456789' . $userId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // إدخال بيانات التقييمات
        DB::table('RattingSys')->insert([
            [
                'trip_id' => 1,
                'user_id' => 1,
                'rating' => 4.5,
                'status' => 'visible',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trip_id' => 1,
                'user_id' => 2,
                'rating' => 3.0,
                'status' => 'hidden',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trip_id' => 1,
                'user_id' => 4,
                'rating' => 3.5,
                'status' => 'visible',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trip_id' => 1,
                'user_id' => 3,
                'rating' => 5.0,
                'status' => 'visible',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Log::info('تم إدخال بيانات التقييمات بنجاح!');
    }
}
