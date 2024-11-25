<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityDistance extends Model
{
    use HasFactory;
    protected $table = 'city_distances';

    protected $fillable = [
        'city_id',
        'destination_id',
        'distance_km',
    ];
    public function sourceCity()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function destinationCity()
    {
        return $this->belongsTo(City::class, 'destination_id');
    }
    // public function city()
    // {
    //     return $this->belongsTo(City::class);
    // }
}
