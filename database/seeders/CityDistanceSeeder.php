<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\CityDistance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CityDistanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = City::all();


        $distances = [
            //دمشق
            ['source' => 'دمشق', 'destination' => 'حمص', 'distance' => 164],
            ['source' => 'دمشق', 'destination' => 'حلب', 'distance' => 359],
            ['source' => 'دمشق', 'destination' => 'حماة', 'distance' => 219],
            ['source' => 'دمشق', 'destination' => 'ادلب', 'distance' => 225],
            ['source' => 'دمشق', 'destination' => 'القامشلي', 'distance' => 702],
            ['source' => 'دمشق', 'destination' => 'طرطوس', 'distance' => 253],
            ['source' => 'دمشق', 'destination' => 'اللاذقية', 'distance' => 335],
            ['source' => 'دمشق', 'destination' => 'القنيطرة', 'distance' => 64],
            ['source' => 'دمشق', 'destination' => 'الحسكة', 'distance' => 370],
            ['source' => 'دمشق', 'destination' => 'الرقة', 'distance' => 436],
            ['source' => 'دمشق', 'destination' => 'السويداء', 'distance' => 108],
            ['source' => 'دمشق', 'destination' => 'درعا', 'distance' => 108],
            ['source' => 'دمشق', 'destination' => 'دير الزور', 'distance' => 451],

            //حمص
            ['source' => 'حمص', 'destination' => 'دمشق', 'distance' => 164],
            ['source' => 'حمص', 'destination' => 'حلب', 'distance' => 193],
            ['source' => 'حمص', 'destination' => 'حماة', 'distance' => 47],
            ['source' => 'حمص', 'destination' => 'ادلب', 'distance' => 135],
            ['source' => 'حمص', 'destination' => 'القامشلي', 'distance' => 538],
            ['source' => 'حمص', 'destination' => 'طرطوس', 'distance' => 94],
            ['source' => 'حمص', 'destination' => 'اللاذقية', 'distance' => 186],
            ['source' => 'حمص', 'destination' => 'القنيطرة', 'distance' => 229],
            ['source' => 'حمص', 'destination' => 'الحسكة', 'distance' => 433],
            ['source' => 'حمص', 'destination' => 'الرقة', 'distance' => 388],
            ['source' => 'حمص', 'destination' => 'السويداء', 'distance' => 268],
            ['source' => 'حمص', 'destination' => 'درعا', 'distance' => 263],
            ['source' => 'حمص', 'destination' => 'دير الزور', 'distance' => 478],

            //حلب

            ['source' => 'حلب', 'destination' => 'حمص', 'distance' => 143],
            ['source' => 'حلب', 'destination' => 'دمشق', 'distance' => 359],
            ['source' => 'حلب', 'destination' => 'حماة', 'distance' => 146],
            ['source' => 'حلب', 'destination' => 'ادلب', 'distance' => 59],
            ['source' => 'حلب', 'destination' => 'القامشلي', 'distance' => 420],
            ['source' => 'حلب', 'destination' => 'طرطوس', 'distance' => 289],
            ['source' => 'حلب', 'destination' => 'اللاذقية', 'distance' => 159],
            ['source' => 'حلب', 'destination' => 'القنيطرة', 'distance' => 722],
            ['source' => 'حلب', 'destination' => 'الحسكة', 'distance' => 722],
            ['source' => 'حلب', 'destination' => 'الرقة', 'distance' => 352],
            ['source' => 'حلب', 'destination' => 'السويداء', 'distance' => 195],
            ['source' => 'حلب', 'destination' => 'درعا', 'distance' => 456],
            ['source' => 'حلب', 'destination' => 'دير الزور', 'distance' => 320],

            //حماة
            ['source' => 'حماة', 'destination' => 'حمص', 'distance' => 74],
            ['source' => 'حماة', 'destination' => 'حلب', 'distance' => 146],
            ['source' => 'حماة', 'destination' => 'دمشق', 'distance' => 219],
            ['source' => 'حماة', 'destination' => 'ادلب', 'distance' => 121],
            ['source' => 'حماة', 'destination' => 'القامشلي', 'distance' => 566],
            ['source' => 'حماة', 'destination' => 'طرطوس', 'distance' => 143],
            ['source' => 'حماة', 'destination' => 'اللاذقية', 'distance' => 147],
            ['source' => 'حماة', 'destination' => 'القنيطرة', 'distance' => 276],
            ['source' => 'حماة', 'destination' => 'الحسكة', 'distance' => 448],
            ['source' => 'حماة', 'destination' => 'الرقة', 'distance' => 341],
            ['source' => 'حماة', 'destination' => 'السويداء', 'distance' => 315],
            ['source' => 'حماة', 'destination' => 'درعا', 'distance' => 310],
            ['source' => 'حماة', 'destination' => 'دير الزور', 'distance' => 425],

            //ادلب
            ['source' => 'ادلب', 'destination' => 'حمص', 'distance' => 168],
            ['source' => 'ادلب', 'destination' => 'حلب', 'distance' => 59],
            ['source' => 'ادلب', 'destination' => 'دمشق', 'distance' => 325],
            ['source' => 'ادلب', 'destination' => 'حماة', 'distance' => 121],
            ['source' => 'ادلب', 'destination' => 'القامشلي', 'distance' => 493],
            ['source' => 'ادلب', 'destination' => 'طرطوس', 'distance' => 192],
            ['source' => 'ادلب', 'destination' => 'اللاذقية', 'distance' => 132],
            ['source' => 'ادلب', 'destination' => 'القنيطرة', 'distance' => 338],
            ['source' => 'ادلب', 'destination' => 'الحسكة', 'distance' => 680],
            ['source' => 'ادلب', 'destination' => 'الرقة', 'distance' => 270],
            ['source' => 'ادلب', 'destination' => 'السويداء', 'distance' => 435],
            ['source' => 'ادلب', 'destination' => 'درعا', 'distance' => 431],
            ['source' => 'ادلب', 'destination' => 'دير الزور', 'distance' => 379],

            //القامشلي
            ['source' => 'القامشلي', 'destination' => 'حمص', 'distance' => 626],
            ['source' => 'القامشلي', 'destination' => 'حلب', 'distance' => 420],
            ['source' => 'القامشلي', 'destination' => 'دمشق', 'distance' => 702],
            ['source' => 'القامشلي', 'destination' => 'ادلب', 'distance' => 494],
            ['source' => 'القامشلي', 'destination' => 'حماة', 'distance' => 566],
            ['source' => 'القامشلي', 'destination' => 'طرطوس', 'distance' => 636],
            ['source' => 'القامشلي', 'destination' => 'اللاذقية', 'distance' => 606],
            ['source' => 'القامشلي', 'destination' => 'القنيطرة', 'distance' => 765],
            ['source' => 'القامشلي', 'destination' => 'الحسكة', 'distance' => 1060],
            ['source' => 'القامشلي', 'destination' => 'الرقة', 'distance' => 264],
            ['source' => 'القامشلي', 'destination' => 'السويداء', 'distance' => 786],
            ['source' => 'القامشلي', 'destination' => 'درعا', 'distance' => 781],
            ['source' => 'القامشلي', 'destination' => 'دير الزور', 'distance' => 248],

            //طرطوس
            ['source' => 'طرطوس', 'destination' => 'حمص', 'distance' => 94],
            ['source' => 'طرطوس', 'destination' => 'حلب', 'distance' => 289],
            ['source' => 'طرطوس', 'destination' => 'حماة', 'distance' => 143],
            ['source' => 'طرطوس', 'destination' => 'ادلب', 'distance' => 186],
            ['source' => 'طرطوس', 'destination' => 'القامشلي', 'distance' => 636],
            ['source' => 'طرطوس', 'destination' => 'دمشق', 'distance' => 253],
            ['source' => 'طرطوس', 'destination' => 'اللاذقية', 'distance' => 90],
            ['source' => 'طرطوس', 'destination' => 'القنيطرة', 'distance' => 316],
            ['source' => 'طرطوس', 'destination' => 'الحسكة', 'distance' => 608],
            ['source' => 'طرطوس', 'destination' => 'الرقة', 'distance' => 370],
            ['source' => 'طرطوس', 'destination' => 'السويداء', 'distance' => 364],
            ['source' => 'طرطوس', 'destination' => 'درعا', 'distance' => 359],
            ['source' => 'طرطوس', 'destination' => 'دير الزور', 'distance' => 474],

            //اللاذقية
            ['source' => 'اللاذقية', 'destination' => 'حمص', 'distance' => 186],
            ['source' => 'اللاذقية', 'destination' => 'حلب', 'distance' => 159],
            ['source' => 'اللاذقية', 'destination' => 'حماة', 'distance' => 147],
            ['source' => 'اللاذقية', 'destination' => 'ادلب', 'distance' => 132],
            ['source' => 'اللاذقية', 'destination' => 'القامشلي', 'distance' => 606],
            ['source' => 'اللاذقية', 'destination' => 'طرطوس', 'distance' => 90],
            ['source' => 'اللاذقية', 'destination' => 'دمشق', 'distance' => 335],
            ['source' => 'اللاذقية', 'destination' => 'القنيطرة', 'distance' => 415],
            ['source' => 'اللاذقية', 'destination' => 'الحسكة', 'distance' => 538],
            ['source' => 'اللاذقية', 'destination' => 'الرقة', 'distance' => 381],
            ['source' => 'اللاذقية', 'destination' => 'السويداء', 'distance' => 454],
            ['source' => 'اللاذقية', 'destination' => 'درعا', 'distance' => 449],
            ['source' => 'اللاذقية', 'destination' => 'دير الزور', 'distance' => 506],

            //القنيطرة
            ['source' => 'القنيطرة', 'destination' => 'حمص', 'distance' => 229],
            ['source' => 'القنيطرة', 'destination' => 'حلب', 'distance' => 722],
            ['source' => 'القنيطرة', 'destination' => 'حماة', 'distance' => 276],
            ['source' => 'القنيطرة', 'destination' => 'ادلب', 'distance' => 388],
            ['source' => 'القنيطرة', 'destination' => 'القامشلي', 'distance' => 765],
            ['source' => 'القنيطرة', 'destination' => 'طرطوس', 'distance' => 316],
            ['source' => 'القنيطرة', 'destination' => 'اللاذقية', 'distance' => 415],
            ['source' => 'القنيطرة', 'destination' => 'دمشق', 'distance' => 64],
            ['source' => 'القنيطرة', 'destination' => 'الحسكة', 'distance' => 339],
            ['source' => 'القنيطرة', 'destination' => 'الرقة', 'distance' => 502],
            ['source' => 'القنيطرة', 'destination' => 'السويداء', 'distance' => 100],
            ['source' => 'القنيطرة', 'destination' => 'درعا', 'distance' => 76],
            ['source' => 'القنيطرة', 'destination' => 'دير الزور', 'distance' => 499],

            //الحسكة
            ['source' => 'الحسكة', 'destination' => 'حمص', 'distance' => 433],
            ['source' => 'الحسكة', 'destination' => 'حلب', 'distance' => 352],
            ['source' => 'الحسكة', 'destination' => 'حماة', 'distance' => 450],
            ['source' => 'الحسكة', 'destination' => 'ادلب', 'distance' => 680],
            ['source' => 'الحسكة', 'destination' => 'القامشلي', 'distance' => 1060],
            ['source' => 'الحسكة', 'destination' => 'طرطوس', 'distance' => 608],
            ['source' => 'الحسكة', 'destination' => 'اللاذقية', 'distance' => 538],
            ['source' => 'الحسكة', 'destination' => 'القنيطرة', 'distance' => 339],
            ['source' => 'الحسكة', 'destination' => 'دمشق', 'distance' => 370],
            ['source' => 'الحسكة', 'destination' => 'الرقة', 'distance' => 188],
            ['source' => 'الحسكة', 'destination' => 'السويداء', 'distance' => 721],
            ['source' => 'الحسكة', 'destination' => 'درعا', 'distance' => 696],
            ['source' => 'الحسكة', 'destination' => 'دير الزور', 'distance' => 163],

            //الرقة
            ['source' => 'الرقة', 'destination' => 'حمص', 'distance' => 388],
            ['source' => 'الرقة', 'destination' => 'حلب', 'distance' => 195],
            ['source' => 'الرقة', 'destination' => 'حماة', 'distance' => 341],
            ['source' => 'الرقة', 'destination' => 'ادلب', 'distance' => 270],
            ['source' => 'الرقة', 'destination' => 'القامشلي', 'distance' => 269],
            ['source' => 'الرقة', 'destination' => 'طرطوس', 'distance' => 370],
            ['source' => 'الرقة', 'destination' => 'اللاذقية', 'distance' => 381],
            ['source' => 'الرقة', 'destination' => 'القنيطرة', 'distance' => 502],
            ['source' => 'الرقة', 'destination' => 'الحسكة', 'distance' => 188],
            ['source' => 'الرقة', 'destination' => 'دمشق', 'distance' => 436],
            ['source' => 'الرقة', 'destination' => 'السويداء', 'distance' => 537],
            ['source' => 'الرقة', 'destination' => 'درعا', 'distance' => 651],
            ['source' => 'الرقة', 'destination' => 'دير الزور', 'distance' => 138],

            //السويداء
            ['source' => 'السويداء', 'destination' => 'حمص', 'distance' => 268],
            ['source' => 'السويداء', 'destination' => 'حلب', 'distance' => 261],
            ['source' => 'السويداء', 'destination' => 'حماة', 'distance' => 315],
            ['source' => 'السويداء', 'destination' => 'ادلب', 'distance' => 435],
            ['source' => 'السويداء', 'destination' => 'القامشلي', 'distance' => 786],
            ['source' => 'السويداء', 'destination' => 'طرطوس', 'distance' => 364],
            ['source' => 'السويداء', 'destination' => 'اللاذقية', 'distance' => 454],
            ['source' => 'السويداء', 'destination' => 'القنيطرة', 'distance' => 98],
            ['source' => 'السويداء', 'destination' => 'الحسكة', 'distance' => 721],
            ['source' => 'السويداء', 'destination' => 'الرقة', 'distance' => 537],
            ['source' => 'السويداء', 'destination' => 'دمشق', 'distance' => 108],
            ['source' => 'السويداء', 'destination' => 'درعا', 'distance' => 68],
            ['source' => 'السويداء', 'destination' => 'دير الزور', 'distance' => 538],

            //درعا
            ['source' => 'درعا', 'destination' => 'حمص', 'distance' => 261],
            ['source' => 'درعا', 'destination' => 'حلب', 'distance' => 456],
            ['source' => 'درعا', 'destination' => 'حماة', 'distance' => 310],
            ['source' => 'درعا', 'destination' => 'ادلب', 'distance' => 431],
            ['source' => 'درعا', 'destination' => 'القامشلي', 'distance' => 781],
            ['source' => 'درعا', 'destination' => 'طرطوس', 'distance' => 359],
            ['source' => 'درعا', 'destination' => 'اللاذقية', 'distance' => 449],
            ['source' => 'درعا', 'destination' => 'القنيطرة', 'distance' => 76],
            ['source' => 'درعا', 'destination' => 'الحسكة', 'distance' => 696],
            ['source' => 'درعا', 'destination' => 'الرقة', 'distance' => 651],
            ['source' => 'درعا', 'destination' => 'السويداء', 'distance' => 68],
            ['source' => 'درعا', 'destination' => 'دمشق', 'distance' => 108],
            ['source' => 'درعا', 'destination' => 'دير الزور', 'distance' => 538],

            //دير الزور
            ['source' => 'دير الزور', 'destination' => 'حمص', 'distance' => 378],
            ['source' => 'دير الزور', 'destination' => 'حلب', 'distance' => 320],
            ['source' => 'دير الزور', 'destination' => 'حماة', 'distance' => 425],
            ['source' => 'دير الزور', 'destination' => 'ادلب', 'distance' => 379],
            ['source' => 'دير الزور', 'destination' => 'القامشلي', 'distance' => 248],
            ['source' => 'دير الزور', 'destination' => 'طرطوس', 'distance' => 474],
            ['source' => 'دير الزور', 'destination' => 'اللاذقية', 'distance' => 506],
            ['source' => 'دير الزور', 'destination' => 'القنيطرة', 'distance' => 499],
            ['source' => 'دير الزور', 'destination' => 'الحسكة', 'distance' => 163],
            ['source' => 'دير الزور', 'destination' => 'الرقة', 'distance' => 138],
            ['source' => 'دير الزور', 'destination' => 'السويداء', 'distance' => 538],
            ['source' => 'دير الزور', 'destination' => 'درعا', 'distance' => 533],
            ['source' => 'دير الزور', 'destination' => ' دمشق', 'distance' => 451],

        ];
        foreach ($distances as $distance) {
            $sourceCity = City::where('name', $distance['source'])->first();
            $destinationCity = City::where('name', $distance['destination'])->first();

            if ($sourceCity && $destinationCity) {
                CityDistance::create([
                    'source_id' => $sourceCity->id,
                    'destination_id' => $destinationCity->id,
                    'distance_km' => $distance['distance']
                ]);
            }
        }
    }
}