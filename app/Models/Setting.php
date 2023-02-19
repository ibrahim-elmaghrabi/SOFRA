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
     $settings = Setting::select('commission')->get();
        foreach($settings as $setting)
        {
            return $setting->commission;
        }
    }

    
}