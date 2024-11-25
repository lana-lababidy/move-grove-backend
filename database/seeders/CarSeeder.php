<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Cars = [
            ['name' => 'Toyota'],
            ['name' => 'Hyundai'],
            ['name' => 'Honda'],
            ['name' => 'Nissan'],
            ['name' => 'Kia'],
            ['name' => 'Ford'],
            ['name' => 'Mazda'],
            ['name' => 'Subaru'],
            ['name' => 'BMW'],
            ['name' => 'Mercedes'],
            ['name' => 'Audi'],
            ['name' => 'Suzuki'],
            ['name' => 'Mitsubishi'],
            ['name' => 'Peugeot']
        ];

        DB::table('Cars')->insert($Cars);
    
    }
}
