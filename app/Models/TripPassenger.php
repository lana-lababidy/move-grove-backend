<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripPassenger extends Model
{
    use HasFactory;


    protected $fillable = [
        'client_id',
        'trip_id',
        'source_id',
        'destination_id',
        'trip_passenger',
    ];

    
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

  
    public function trip()
    {
        return $this->belongsTo(Trip::class, 'trip_id');
    }



       public function status()
    {
        return $this->belongsTo(TPStatus::class);
    }
    public function sourceCity()
    {
        return $this->belongsTo(City::class, 'source_id');
    }

    public function destinationCity()
    {
        return $this->belongsTo(City::class, 'destination_id');
    }

}
