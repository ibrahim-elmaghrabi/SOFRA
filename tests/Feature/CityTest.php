<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\City;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CityTest extends TestCase
{
    use RefreshDatabase ;
  
    public function test_api_returns_list_cities()
    {
        $city = City::create([
            'name' => 'alex',
        ]);
        $response = $this->get('api/v1/cities');

        $response->assertJson([$city->toArray()]);
    }
}
