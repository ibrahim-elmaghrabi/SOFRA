<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Eloquent\{
    AreaRepository,
    CityRepository,
    PaymentMethodRepository,
    CategoryRepository,
    PaymentRepository,
    ClientRepository,
    RestaurantRepository,
    OfferRepository,
    MealRepository,
    OrderRepository,
    UserRepository,
    ContactRepository,
    CommentRepository,
    SettingRepository,
    RoleRepository,
    PermissionRepository
};
use App\Repositories\Contracts\{
    AreaRepositoryContract,
    CityRepositoryContract,
    PaymentRepositoryContract,
    CategoryRepositoryContract,
    PaymentMethodRepositoryContract,
    ClientRepositoryContract,
    RestaurantRepositoryContract,
    OfferRepositoryContract,
    MealRepositoryContract,
    OrderRepositoryContract,
    UserRepositoryContract,
    ContactRepositoryContract,
    CommentRepositoryContract,
    SettingRepositoryContract,
    RoleRepositoryContract,
    PermissionRepositoryContract,
};

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(CityRepositoryContract::class, CityRepository::class);
        $this->app->bind(AreaRepositoryContract::class, AreaRepository::class);
        $this->app->bind(CategoryRepositoryContract::class, CategoryRepository::class);
        $this->app->bind(PaymentMethodRepositoryContract::class, PaymentMethodRepository::class);
        $this->app->bind(PaymentRepositoryContract::class, PaymentRepository::class);
        $this->app->bind(RestaurantRepositoryContract::class, RestaurantRepository::class);
        $this->app->bind(ClientRepositoryContract::class, ClientRepository::class);
        $this->app->bind(OfferRepositoryContract::class, OfferRepository::class);
        $this->app->bind(MealRepositoryContract::class, MealRepository::class);
        $this->app->bind(OrderRepositoryContract::class, OrderRepository::class);
        $this->app->bind(UserRepositoryContract::class, UserRepository::class);
        $this->app->bind(CommentRepositoryContract::class, CommentRepository::class);
        $this->app->bind(ContactRepositoryContract::class, ContactRepository::class);
        $this->app->bind(SettingRepositoryContract::class, SettingRepository::class);
        $this->app->bind(RoleRepositoryContract::class, RoleRepository::class);
        $this->app->bind(PermissionRepositoryContract::class, PermissionRepository::class);
    }

    
}