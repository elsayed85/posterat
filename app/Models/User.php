<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements MustVerifyEmail,JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','phone', 'email', 'password','bio',
        'usual_balance','paid_balance','usual_expired_at','usual_expired_at','photo','photo_thumb'
    ];
    protected $dates = ['usual_expired_at','usual_expired_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
//    public function setPasswordAttribute($password)
//    {
//        if (!empty($password))
//        {
//            $this->attributes['password'] = bcrypt($password);
//        }
//    }
    public function getFullNameAttribute() // notice that the attribute name is in CamelCase.
    {
        return $this->first_name . ' ' . $this->last_name;//full_name
    }
    public function getSinceAttribute()
    {
        if (is_null($this->created_at)) return '';

        return $this->created_at->diffForHumans();
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function ads()
    {
        return $this->hasMany(Ad::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function bookmarks(){
        return $this->belongsToMany(Ad::class, 'bookmarks', 'user_id', 'ad_id')->withTimestamps();
    }
    public function disturb_hours()//single but name should be hours
    {
        return $this->hasOne(DisturbHour::class);
    }

}
