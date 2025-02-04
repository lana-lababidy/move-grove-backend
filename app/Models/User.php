<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Passport\HasApiTokens;
// use trait Laravel\Passport\HasApiTokens;
use Laravel\Passport\HasApiTokens;

use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasApiTokens ;    

    public function findForPassport($username)
    {
        return $this->where('username', $username)->first();
    } 
    
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
        return $this->hasOne(Tripuser::class);
    }

    public function trips()
    {
        return $this->belongsToMany(Trip::class, 'trip_user')
                    ->withPivot('status'); 
                    // إضافة عمود الحالة في الجدول الوسيط
    }

    public function Tripusers()
    {
        return $this->hasMany(Tripuser::class);
    }

    
    public function notification()
    {
        return $this->hasMany(Notification::class);
    }
    public function ratings()
    {
        return $this->morphMany(Rating::class, 'ratingable');
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function RattingSys()
    {
        return $this->hasMany(RattingSys::class, 'user_id');
    }

        // العلاقة بين المستخدمين والتقييمات التي حصلوا عليها
        public function ratingsReceived()
        {
            return $this->hasMany(user_ratings::class, 'rated_id');
        }
    
        // حساب المتوسط الحسابي لتقييمات المستخدم
        public function averageRating()
        {
            return $this->ratingsReceived()->avg('rating');
        }

        public function tripps()
        {
            return $this->belongsToMany(Trip::class, 'trip_users', 'client_id', 'trip_id')
                        ->withPivot('status', 'source_id', 'destination_id')
                        ->withTimestamps();
        }
        


}
