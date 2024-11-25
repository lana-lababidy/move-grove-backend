<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class City extends Model
{
    use HasFactory;
    protected $table = 'cities';

    protected $fillable = [
        'name',
        'distance_km',
    ];

    public function sourceTrips()
    {
        return $this->hasOne(TripPassenger::class, 'source_id');
    }

    public function destinationTrips()
    {
        return $this->hasOne(TripPassenger::class, 'destination_id');
    }
    public function distances()
    {
        return $this->belongsToMany(City::class, 'city_distances', 'city_id', 'destination_id')
            ->withPivot('distance_km');
            
    }

    // public function CityDistance()
    // {
    //     return $this->hasOne(CityDistance::class);
    // }
}
