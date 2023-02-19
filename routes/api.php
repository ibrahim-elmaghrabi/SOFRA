<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\{
    AreaController,
    CityController,
    CategoryController,
    RestaurantController,
    ContactController,
    OfferController,
    MealController,
    ClientController,
    CommentController,
    ClientOrderController,
    RestaurantOrderController,
    Auth\LogoutController,
};
use App\Http\Controllers\Api\V1\Auth\Restaurant\{
    RestaurantRegisterController,
    RestaurantLoginController,
    RestaurantResetPasswordController,
};

use App\Http\Controllers\Api\V1\Auth\Client\{
    ClientRegisterController,
    ClientLoginController,
    ClientResetPasswordController,
};



Route::group(["prefix" => 'v1'], function()
{
    Route::get('/cities',[CityController::class, 'index']);
    
    Route::get('/areas', [AreaController::class, 'index']);
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::post('/contacts/create', [ContactController::class, 'create']);
    Route::get('/offers', [OfferController::class, 'index']);
    Route::get('/offers/{offer}', [OfferController::class, 'show']);
    Route::get('restaurants', [RestaurantController::class, 'index']);
    Route::get('restaurants/{restaurant}', [RestaurantController::class, 'show']);
    Route::get('restaurants/{restaurant}/meals', [MealController::class, 'index']);
    Route::get('restaurants/{restaurant}/meals/{meal}', [MealController::class, 'show']);
    Route::get('restaurants/{restaurant}/comments', [CommentController::class, 'index']);
    Route::get('restaurants/{restaurant}/comments/{comment}', [CommentController::class, 'show']);
    //Auth
    Route::post('restaurants/register', [RestaurantRegisterController::class, 'register']);
    Route::post('restaurants/login', [RestaurantLoginController::class, 'login']);
    Route::post('restaurants/forget-password', [RestaurantResetPasswordController::class, 'forgetPassword']);
    Route::patch('restaurants/reset-password', [RestaurantResetPasswordController::class, 'resetPassword']);
    Route::post('clients/register', [ClientRegisterController::class, 'register']);
    Route::post('clients/login', [ClientLoginController::class, 'login']);
    Route::post('clients/forget-password', [ClientResetPasswordController::class, 'forgetPassword']);
    Route::patch('clients/reset-password', [ClientResetPasswordController::class, 'resetPassword']);

    Route::group(['middleware' => 'auth:restaurants'], function()
    {
        Route::put('restaurants/profile', [RestaurantController::class, 'update']);
        Route::post('restaurants/meals/create', [MealController::class, 'create']);
        Route::put('restaurants/meals/{meal}',  [MealController::class, 'update']);
        Route::delete('restaurants/meals/{meal}', [MealController::class, 'destroy']);
        Route::post('restaurants/offers/create', [OfferController::class, 'create']);
        Route::put('restaurants/offers/{offer}', [OfferController::class, 'update']);
        Route::delete('restaurants/offers/{offer}', [OfferController::class, 'destroy']);
        Route::get('restaurant-orders', [RestaurantOrderController::class, 'index']);
        Route::get('restaurant-orders/{order}', [RestaurantOrderController::class, 'show']);
        Route::patch('restaurants/orders/accept-order', [RestaurantOrderController::class,'acceptOrder']);
        Route::patch('restaurants/orders/deliver-order', [RestaurantOrderController::class,'deliverOrder']);
        Route::patch('restaurants/orders/reject-order', [RestaurantOrderController::class,'rejectOrder']);
        Route::post('restaurants/logout', [LogoutController::class, 'logout']);
    });

    Route::group(['middleware' => 'auth:clients'], function ()
    {
        Route::put('clients/profile', [ClientController::class, 'update']);
        Route::post('comments/create', [CommentController::class, 'create']);
        Route::get('clients/orders', [ClientOrderController::class , 'index']);
        Route::get('clients/orders/{order}', [ClientOrderController::class , 'show']);
        Route::post('clients/orders', [ClientOrderController::class, 'store']);
        Route::patch('clients/orders/decline-order', [ClientOrderController::class, 'update']);
        Route::post('clients/logout', [LogoutController::class, 'logout']);

    });
});
 