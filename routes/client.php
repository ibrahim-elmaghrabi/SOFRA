<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\{
    Client\ClientController,
    Client\OrderController,
    CommentController,
};

use App\Http\Controllers\Api\V1\Client\Auth\{
    ClientRegisterController,
    ClientLoginController,
    ClientResetPasswordController,
    LogoutController
};



Route::group(["prefix" => 'v1/clients'], function()
{
    Route::post('/register', [ClientRegisterController::class, 'register']);
    Route::post('/login', [ClientLoginController::class, 'login']);
    Route::post('/forget-password', [ClientResetPasswordController::class, 'forgetPassword']);
    Route::patch('/reset-password', [ClientResetPasswordController::class, 'resetPassword']);
    
    Route::group(['middleware' => 'auth:clients'], function ()
    {
        Route::put('/profile', [ClientController::class, 'update']);
        Route::post('comments/create', [CommentController::class, 'create']);
        Route::get('/orders', [OrderController::class , 'index']);
        Route::get('/orders/{order}', [OrderController::class , 'show']);
        Route::post('/orders', [OrderController::class, 'store']);
        Route::patch('/orders/decline-order', [OrderController::class, 'update']);
        Route::post('/logout', [LogoutController::class, 'logout']);
    });

});
