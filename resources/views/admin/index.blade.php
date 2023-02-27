@extends('admin.layouts.master');

@inject('restaurants', 'App\Models\Restaurant')
@inject('categories', 'App\Models\Category')
@inject('contacts', 'App\Models\Contact')
@inject('clients', 'App\Models\Client')
@inject('orders', 'App\Models\Order')
@inject('offers', 'App\Models\Offer')
@inject('cities', 'App\Models\City')
@inject('areas', 'App\Models\Area')
@inject('meals', 'App\Models\Meal')

@section('main-pageName') Home @endsection
@section('pageName') Statistics @endsection
@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $restaurants->count() }}</h3>
                <p>Restaurants</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-city"></i>
              </div>
              <a href="{{ route('restaurants.index') }}" class="small-box-footer">More info
                   <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $areas->count() }}</h3>
                <p>Areas</p>
              </div>
              <div class="icon">
                <i class="fas fa-flag"></i>
              </div>
              <a href="{{ route('areas.index') }}" class="small-box-footer">More info
                  <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $clients->count() }}</h3>
                <p>Clients</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ route('clients.index') }}" class="small-box-footer">More info
                <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-light">
              <div class="inner">
                <h3>{{ $contacts->count() }}</h3>
                <p>Messages</p>
              </div>
              <div class="icon">
                <i class="nav-icon far fa-envelope"></i>
              </div>
              <a href="{{ route('contacts.index') }}" class="small-box-footer">More info
                <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        </div>
         <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{ $categories->count() }}</h3>
                <p>Categories</p>
              </div>
              <div class="icon">
                  <i class="fa-solid fa-server"></i>
              </div>
              <a href="{{ route('categories.index') }}" class="small-box-footer">More info
                <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>{{ $offers->count() }}</h3>
                <p>Offers</p>
              </div>
              <div class="icon">
                 <i class="fa-solid fa-copy"></i>
              </div>
              <a href="{{ route('offers.index') }}" class="small-box-footer">More info
                <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $orders->count() }}</h3>
                <p>Orders</p>
              </div>
              <div class="icon">
                <i class="fas fa-images"></i>
              </div>
              <a href="{{ route('orders.index') }}" class="small-box-footer">More info
                <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
  </section>
@endsection
 