<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'lana',
            'last_name' => 'lababidy',
            'gender' => 'female',
            'mobile_number' => '0968879073',
        ]);

        User::create([
            'username' => 'salem',
            'last_name' => 'saad',
            'gender' => 'male',
            'mobile_number' => '0947214749',
        ]);
    
    }
}
