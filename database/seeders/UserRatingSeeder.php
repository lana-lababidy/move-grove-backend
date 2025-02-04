<?php

namespace Database\Seeders;

use App\Models\UserRating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // بيانات افتراضية لتقييم المستخدمين
        $ratings = [
            ['rated_user_id' => 1, 'rating_user_id' => 2, 'rating' => 4.5, 'status' => 'visible'],
            ['rated_user_id' => 2, 'rating_user_id' => 3, 'rating' => 3.8, 'status' => 'visible'],
            ['rated_user_id' => 3, 'rating_user_id' => 1, 'rating' => 5.0, 'status' => 'hidden'],
            ['rated_user_id' => 1, 'rating_user_id' => 3, 'rating' => 4.0, 'status' => 'visible'],
            ['rated_user_id' => 2, 'rating_user_id' => 1, 'rating' => 2.5, 'status' => 'hidden'],
        ];
        // إدخال البيانات إلى الجدول
        foreach ($ratings as $rating) {
            UserRating::create($rating);
        }
    }
}