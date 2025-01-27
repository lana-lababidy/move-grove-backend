<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRating extends Model
{
    protected $table = 'UserRating';

    use HasFactory;
    protected $fillable = [
        'rated_user_id', 
        'rating', 
        'review'
    ];

    public function rated()
    {
        return $this->belongsTo(User::class, 'rated_id');
    }
}