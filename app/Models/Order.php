<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = 'orders';
    public $timestamps = true;
    protected $fillable = array('address', 'client_id', 'restaurant_id', 'payment_method_id',
    'delivery_charge', 'commission','net', 'cost', 'state', 'total_cost', 'note');

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function meals()
    {
        return $this->belongsToMany('App\Models\Meal')->withPivot('price','quantity','note');
    }

    public function paymentMethod()
    {
        return $this->belongsTo('App\Models\PaymentMethod');
    }

    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant');
    }

    
}