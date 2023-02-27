<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    AreaController,
    CityController,
    HomeController,
    MealController,
    RoleController,
    UserController,
    OfferController,
    OrderController,
    ClientController,
    CommentController,
    ContactController,
    PaymentController,
    SettingController,
    CategoryController,
    RestaurantController,
    UserPasswordController,
    PaymentMethodController,
};
 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('/',[HomeController::class, 'index']);
    Route::resource('users', UserController::class)->except('show');
    Route::get('/logout', [UserController::class, 'logout'])->name('admins.logout');
    Route::resource('roles', RoleController::class)->except('show');
    Route::resource('cities', CityController::class)->except('show');
    Route::resource('areas',AreaController::class)->except('show');
    Route::resource('payments',PaymentController::class)->except('show');
    Route::resource('categories',CategoryController::class)->except('show');
    Route::resource('payment-methods',PaymentMethodController::class)->except('show');
    Route::resource('contacts',ContactController::class)->except('create', 'update', 'edit');
    Route::resource('meals', MealController::class)->only('index', 'destroy');
    Route::resource('clients',ClientController::class)->only('index', 'destroy');
    Route::resource('restaurants',RestaurantController::class)->only('index', 'show', 'destroy');
    Route::resource('offers', OfferController::class)->only('index', 'destroy');
    Route::resource('comments', CommentController::class)->only('index', 'destroy');
    Route::resource('orders', OrderController::class)->only('index', 'show', 'destroy');
    Route::resource('settings', SettingController::class)->only('edit', 'update');
    Route::resource('change-passwords', UserPasswordController::class)->only('edit', 'update');
});
