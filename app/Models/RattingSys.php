<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RattingSys extends Model
{
    use HasFactory;
    protected $table = 'RattingSys';
    protected $fillable = [
        'trip_id',
        'user_id',
        'rating',
        'status',
    ];
    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
public function trip()
{
    return $this->belongsTo(Trip::class, 'trip_id');
}


}
