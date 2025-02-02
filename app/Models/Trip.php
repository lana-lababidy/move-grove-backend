<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $table = 'Trips';

    protected $fillable = [
        'driver_id',
        'total_seats',
        'price',
        'car_id',
        'dateTime',
        'status_id',
        'notes',
    ];



    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function car_user()
    {
        return $this->belongsTo(User::class);
    }

    // public function TripStatus()
    // {
    //     return $this->hasOne(TripStatus::class);
    // }

    public function Tripuser()
    {
        return $this->hasMany(Tripuser::class);
    }

    public function TPStatus()
    {
        return $this->belongsTo(TPStatus::class);
    }

    public function passengers()
    {
        return $this->belongsToMany(User::class, 'trip_user')->withPivot('status');
    }

    public function ratings()
    {
        return $this->morphMany(Rating::class, 'ratingable');
    }
    public function RattingSys()
    {
        return $this->hasMany(RattingSys::class, 'trip_id');
    }
    public function passengerrs()
{
    return $this->belongsToMany(User::class, 'trip_users', 'trip_id', 'client_id')
                ->withPivot('status', 'source_id', 'destination_id')
                ->withTimestamps();
}

public function status()
{
    return $this->belongsTo(TripStatus::class, 'status_id');
}

}
