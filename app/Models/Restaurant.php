<?php

namespace App\Models;



use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Restaurant extends Authenticatable
{

    use HasApiTokens, Notifiable ;

    protected $table = 'restaurants';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'phone', 'delivery_charge', 'minimum_order', 'area_id', 'password', 'delivery_phone', 'delivery_whatsapp', 'image', 'pin_code', 'open_at', 'close_at', 'active');

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function isActive()
    {
        return ($this->attributes['active'] == 0) ? 'closed' : 'opened' ;
    }

    public function routeNotificationForFcm()
    {
        return $this->tokens()->pluck('device_token')->toArray();
        
    }
    
    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }

    public function meals()
    {
        return $this->hasMany('App\Models\Meal');
    }

    public function offers()
    {
        return $this->hasMany('App\Models\Offer');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    public function account()
    {
        return $this->hasMany('App\Models\Payment');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Restaurant');
    }

}