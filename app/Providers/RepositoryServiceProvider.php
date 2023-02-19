<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\AreaRepositoryContract;
use App\Repositories\Contracts\CityRepositoryContract;
use App\Repositories\Contracts\MealRepositoryContract;
use App\Repositories\Contracts\OfferRepositoryContract;
use App\Repositories\Contracts\OrderRepositoryContract;
use App\Repositories\Eloquent\AreaRepository;
use App\Repositories\Eloquent\AuthRepository;
use App\Repositories\Eloquent\CityRepository;
use App\Repositories\Eloquent\MealRepository;
use App\Repositories\Contracts\ClientRepositoryContract;
use App\Repositories\Eloquent\OfferRepository;
use App\Repositories\Eloquent\OrderRepository;
use App\Repositories\Contracts\CommentRepositoryContract;
use App\Repositories\Contracts\ContactRepositoryContract;
use App\Repositories\Eloquent\ClientRepository;
use App\Repositories\Contracts\CategoryRepositoryContract;
use App\Repositories\Eloquent\CommentRepository;
use App\Repositories\Eloquent\ContactRepository;
use App\Repositories\Eloquent\CategoryRepository;
use App\Repositories\Contracts\RestaurantRepositoryContract;
use App\Repositories\Eloquent\RestaurantRepository;
use App\Repositories\Contracts\AuthRepositoryContract;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
         
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(AreaRepositoryContract::class, AreaRepository::class);
        $this->app->bind(CityRepositoryContract::class, CityRepository::class);
        $this->app->bind(MealRepositoryContract::class, MealRepository::class);
        $this->app->bind(OfferRepositoryContract::class, OfferRepository::class);
        $this->app->bind(OrderRepositoryContract::class, OrderRepository::class);
        $this->app->bind(ClientRepositoryContract::class, ClientRepository::class);
        $this->app->bind(CommentRepositoryContract::class, CommentRepository::class);
        $this->app->bind(ContactRepositoryContract::class, ContactRepository::class);
        $this->app->bind(RestaurantRepositoryContract::class, RestaurantRepository::class);
        $this->app->bind(CategoryRepositoryContract::class, CategoryRepository::class);
        $this->app->bind(AuthRepositoryContract::class, AuthRepository::class);



        





        



    }
}
