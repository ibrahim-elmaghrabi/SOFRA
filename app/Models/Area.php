<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model 
{

    protected $table = 'areas';
    public $timestamps = true;
    protected $fillable = array('name', 'city_id');

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }

    public function restaurants()
    {
        return $this->hasMany('App\Models\Restaurant');
    }

}