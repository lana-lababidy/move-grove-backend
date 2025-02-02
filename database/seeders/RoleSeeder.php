<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->where('role_id', 1)->update(['role_id' => 2]); // تحديث المستخدمين الذين لديهم role_id 1 (admin)

        // حذف البيانات القديمة في جدول roles
        DB::table('roles')->delete();

        // إضافة دور Admin مع id=1
        Role::create([
            'id' => 1,
            'name' => 'admin',
        ]);

        // إضافة دور Client مع id=2
        Role::create([
            'id' => 2,
            'name' => 'client',
        ]);
    }
}
