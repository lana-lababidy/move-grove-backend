<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{    public function run(): void
    { // إنشاء admin
        User::create([
            'last_name' => 'أحمد',
            'username' => 'admin123',
            'gender' => 'ذكر',
            'expire_at' => null,  // لا يتم ملؤها
            'mobile_number' => '0912345678',
            'user_session' => null, // لا يتم ملؤها
            'car_mechanics_image' => null, // لا يتم ملؤها
            'driver_certificate_copy' => null, // لا يتم ملؤها
            'car_insurance_copy' => null, // لا يتم ملؤها
            'car_image' => null, // لا يتم ملؤها
            'car_front_image' => null, // لا يتم ملؤها
            'car_back_image' => null, // لا يتم ملؤها
            'fcm_token' => null, // لا يتم ملؤها
            'role_id' => 1,
        ]);

        // إنشاء زبون
        User::create([
            'last_name' => 'محمود',
            'username' => 'customer123',
            'gender' => 'ذكر',
            'expire_at' => null,  // لا يتم ملؤها
            'mobile_number' => '0912345679',
            'user_session' => null, // لا يتم ملؤها
            'car_mechanics_image' => null, // لا يتم ملؤها
            'driver_certificate_copy' => null, // لا يتم ملؤها
            'car_insurance_copy' => null, // لا يتم ملؤها
            'car_image' => null, // لا يتم ملؤها
            'car_front_image' => null, // لا يتم ملؤها
            'car_back_image' => null, // لا يتم ملؤها
            'fcm_token' => null, // لا يتم ملؤها
            'role_id' => 2, // افترض أن الـ role_id الخاص بالزبون هو 2 في جدول الـ roles
        ]);

        // إنشاء زبون
        User::create([
            'last_name' => 'لانا',
            'username' => 'customer1234',
            'gender' => 'ذكر',
            'expire_at' => null,  // لا يتم ملؤها
            'mobile_number' => '0912345659',
            'user_session' => null, // لا يتم ملؤها
            'car_mechanics_image' => null, // لا يتم ملؤها
            'driver_certificate_copy' => null, // لا يتم ملؤها
            'car_insurance_copy' => null, // لا يتم ملؤها
            'car_image' => null, // لا يتم ملؤها
            'car_front_image' => null, // لا يتم ملؤها
            'car_back_image' => null, // لا يتم ملؤها
            'fcm_token' => null, // لا يتم ملؤها
            'role_id' => 2, // افترض أن الـ role_id الخاص بالزبون هو 2 في جدول الـ roles
        ]);

        // إنشاء زبون
        User::create([
            'last_name' => 'عمر',
            'username' => 'customer1235',
            'gender' => 'ذكر',
            'expire_at' => null,  // لا يتم ملؤها
            'mobile_number' => '0912345559',
            'user_session' => null, // لا يتم ملؤها
            'car_mechanics_image' => null, // لا يتم ملؤها
            'driver_certificate_copy' => null, // لا يتم ملؤها
            'car_insurance_copy' => null, // لا يتم ملؤها
            'car_image' => null, // لا يتم ملؤها
            'car_front_image' => null, // لا يتم ملؤها
            'car_back_image' => null, // لا يتم ملؤها
            'fcm_token' => null, // لا يتم ملؤها
            'role_id' => 2, // افترض أن الـ role_id الخاص بالزبون هو 2 في جدول الـ roles
        ]);
    }
}