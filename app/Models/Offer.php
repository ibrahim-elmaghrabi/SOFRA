<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

    protected $table = 'offers';
    public $timestamps = true;
    protected $fillable = array('restaurant_id', 'offer', 'start_date', 'end_date', 'image', 'title');

    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant');
    }

}