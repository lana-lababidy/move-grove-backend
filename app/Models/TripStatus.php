<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripStatus extends Model
{
    use HasFactory;
    protected $table = 'trip_statuses';

    protected $fillable = [
        'name',
        'code',
    ];
    // public function trip()
    // {
    //     return $this->belongsTo(Trip::class);
    // }
    public function trips()
    {
        return $this->hasMany(Trip::class, 'status_id');
    }

    public function passenger()
    {
        return $this->belongsTo(Tripuser::class);
    }
}
