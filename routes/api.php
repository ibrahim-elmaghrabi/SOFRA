<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\{
    CityController,
    AreaController,
    CategoryController,
    ContactController,
    OfferController,
};



Route::group(["prefix" => 'v1'], function()
{
    Route::get('/cities',[CityController::class, 'index']);
    Route::get('/areas', [AreaController::class, 'index']);
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::post('/contacts/create', [ContactController::class, 'create']);
    Route::get('/offers', [OfferController::class, 'index']);
    Route::get('/offers/{offer}', [OfferController::class, 'show']);
});
 