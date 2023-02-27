<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('commission');


    public static function getAppCommission()
    {
        $setting = Setting::firstOrNew();
        return $setting->commission;
    }

    
}