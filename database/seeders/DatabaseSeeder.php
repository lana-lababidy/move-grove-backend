<?php

namespace Database\Seeders;

use App\Models\Cars;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\U ser::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            TrippSeeder::class,
            CarSeeder::class,
            CityDistanceSeeder::class,
            RoleSeeder::class,
            SettingSeeder::class,
            SyrianCitiesseeder::class,
            TPStatusSeeder::class,
            TPStatusSeeder::class,
            UserSeeder::class,
            RatingSeeder::class,
            UserRatingSeeder::class,
        ]);
    }
}
