<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{    public function run(): void
    {

        $role = Role::first(); // أو اختر دورًا محددًا

        User::create([
            'username' => 'lana',
            'last_name' => 'lababidy',
            'gender' => 'female',
            'mobile_number' => '0968879073',
            'role_id' => $role->id, // إضافة role_id
        ]);
    
        User::create([
            'username' => 'salem',
            'last_name' => 'saad',
            'gender' => 'male',
            'mobile_number' => '0947214749',
            'role_id' => $role->id, // إضافة role_id
        ]);
    }
}
