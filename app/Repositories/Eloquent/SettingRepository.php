<?php

namespace App\Repositories\Eloquent;

use App\Models\Setting;
use App\Repositories\Eloquent\BasicRepository;
use App\Repositories\Contracts\SettingRepositoryContract;
 
class SettingRepository extends BasicRepository implements SettingRepositoryContract
{
    public function entity()
    {
        return Setting::class;
    }
 
}