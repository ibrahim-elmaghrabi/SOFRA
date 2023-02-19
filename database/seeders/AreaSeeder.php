<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create([
            'name' => 'حي الجامعه',
            'city_id' => 1
        ]);

         Area::create([
            'name' => 'المشايه',
            'city_id' => 1,
        ]);
    }
}
