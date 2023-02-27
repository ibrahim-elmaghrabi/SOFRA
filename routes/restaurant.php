<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\{
    Restaurant\RestaurantController,
    Restaurant\OrderController,
    OfferController,
    MealController,
    CommentController,
};
use App\Http\Controllers\Api\V1\Restaurant\Auth\{
    RestaurantRegisterController,
    RestaurantLoginController,
    RestaurantResetPasswordController,
    LogoutController
};
 

Route::group(["prefix" => 'v1/restaurants'], function()
{
    Route::get('/', [RestaurantController::class, 'index']);
    Route::get('/{restaurant}', [RestaurantController::class, 'show']);
    Route::get('/{restaurant}/meals', [MealController::class, 'index']);
    Route::get('/{restaurant}/meals/{meal}', [MealController::class, 'show']);
    Route::get('/{restaurant}/comments', [CommentController::class, 'index']);
    Route::get('/{restaurant}/comments/{comment}', [CommentController::class, 'show']);
    //Auth
    Route::post('/register', [RestaurantRegisterController::class, 'register']);
    Route::post('/login', [RestaurantLoginController::class, 'login']);
    Route::post('/forget-password', [RestaurantResetPasswordController::class, 'forgetPassword']);
    Route::patch('/reset-password', [RestaurantResetPasswordController::class, 'resetPassword']);
    
    Route::group(['middleware' => 'auth:restaurants'], function()
    {
        Route::put('/profile', [RestaurantController::class, 'update']);
        Route::post('/meals/create', [MealController::class, 'create']);
        Route::put('/meals/{meal}',  [MealController::class, 'update']);
        Route::delete('/meals/{meal}', [MealController::class, 'destroy']);
        Route::post('/offers/create', [OfferController::class, 'create']);
        Route::put('/offers/{offer}', [OfferController::class, 'update']);
        Route::delete('/offers/{offer}', [OfferController::class, 'destroy']);
        Route::get('/orders', [OrderController::class, 'index']);
        Route::get('/orders/{order}', [OrderController::class, 'show']);
        Route::patch('/orders/accept-order', [OrderController::class,'acceptOrder']);
        Route::patch('/orders/deliver-order', [OrderController::class,'deliverOrder']);
        Route::patch('/orders/reject-order', [OrderController::class,'rejectOrder']);
        Route::post('/logout', [LogoutController::class, 'logout']);
    });
});
 