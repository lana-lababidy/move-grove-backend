<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            Setting::create([
                'key' => 'fuel_price_per_liter',
                'value' => 1.5, // سعر اللتر من الوقود
            ]);
    
            Setting::create([
                'key' => 'company_profit_rate',
                'value' => 0.20, // نسبة ربح الشركة (20%)
            ]);
    
            Setting::create([
                'key' => 'fuel_consumption_rate',
                'value' => 2.1, // معدل استهلاك الوقود (كم لكل لتر)
            ]);
    
    }
}
