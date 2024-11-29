<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Passport\HasApiTokens;
// use trait Laravel\Passport\HasApiTokens;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasRoles;  
    use HasFactory, Notifiable;
    use HasApiTokens ;    

    protected $fillable = [
        'username',
        'gender',
        'mobile_number',
        'session',
        'otp',
        'expire_at',
        'last_name',
        'user_session',
        'fcm_token',
        'car_mechanics_image',
        'driver_certificate_copy',
        'car_image',
        'car_front_image',
        'car_back_image',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
   
    public function TripUser()
    {
        return $this->hasOne(Trip::class);
    }

    public function trip_passenger()
    {
        return $this->hasOne(TripPassenger::class);
    }

    public function trips()
    {
        return $this->belongsToMany(Trip::class, 'trip_user')
                    ->withPivot('status'); 
                    // إضافة عمود الحالة في الجدول الوسيط
    }

    public function tripPassengers()
    {
        return $this->hasMany(TripPassenger::class);
    }

    
    public function notification()
    {
        return $this->hasMany(Notification::class);
    }
    public function ratings()
    {
        return $this->morphMany(Rating::class, 'ratingable');
    }
    
}
