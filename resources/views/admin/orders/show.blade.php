@extends('admin.layouts.master')
@push('css')
<!-- BS Stepper -->
  <link rel="stylesheet" href="{{  asset('assets/plugins/bs-stepper/css/bs-stepper.min.css')}}">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{  asset('assets/plugins/dropzone/min/dropzone.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{  asset('assets/dist/css/adminlte.min.css')}}">
@endpush
@section('main-pageName') Order @endsection
@section('pageName')  View  @endsection
@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Order</h3>
              </div>
              <div class="card-body p-0">
                <div class="bs-stepper">
                  <div class="card-body">
                    <div class="row">
                        <div class="col">
                            {{ Form::label('restaurant' , 'Restaurant') }}
                            {{ Form::text('restaurant', $order->restaurant->name,
                              ['class' => 'form-control' , 'disabled'] ) }}
                        </div>
                        <div class="col">
                            {{ Form::label('email' , 'Email') }}
                            {{ Form::text('email', $order->restaurant->email,
                              ['class' => 'form-control' , 'disabled'] ) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            {{ Form::label('email', 'Client Email') }}
                            {{ Form::text('email', $order->client->email,
                              ['class' => 'form-control' , 'disabled']) }}
                        </div>
                        <div class="col">
                            {{ Form::label('address', 'Address Deliver') }}
                            {{ Form::text('address', $order->address,
                              ['class' => 'form-control' , 'disabled' ] ) }}
                        </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        {{ Form::label('cost', 'Cost') }}
                        {{ Form::text('cost', $order->cost,
                        ['class' => 'form-control' , 'disabled']) }}
                      </div>
                      <div class="col">
                        {{ Form::label('commission', 'App-Commission') }}
                        {{ Form::text('commission', $order->commission,
                        ['class' => 'form-control' , 'disabled' ] ) }}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        {{ Form::label('total_cost', 'Total-Cost') }}
                        {{ Form::text('total_cost', $order->total_cost,
                        ['class' => 'form-control' , 'disabled' ] ) }}
                      </div>
                      <div class="col">
                        {{ Form::label('net', 'Net') }}
                        {{ Form::text('net', $order->net,
                        ['class' => 'form-control' , 'disabled']) }}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        {{ Form::label('payment_method', 'Payment-Method') }}
                        {{ Form::text('payment_method', $order->paymentMethod->name,
                        ['class' => 'form-control' , 'disabled' ] ) }}
                      </div>
                      <div class="col">
                        {{ Form::label('delivery_charge', 'Delivery-Charge') }}
                        {{ Form::text('delivery_charge', $order->delivery_charge,
                        ['class' => 'form-control' , 'disabled']) }}
                      </div>
                    </div>
                    @foreach ($order->meals as $meal)
                    <div class="row">
                      <div class="col">
                        {{ Form::label('name', 'Meal-Name') }}
                        {{ Form::text('payment_method', $meal->name ,
                        ['class' => 'form-control' , 'disabled' ] ) }}
                      </div>
                      <div class="col">
                        {{ Form::label('price', 'Meal-Price') }}
                        {{ Form::text('price', $meal->price,
                        ['class' => 'form-control' , 'disabled']) }}
                      </div>
                    </div>
                    @endforeach
                    <div class="row">
                      <div class="col">
                        {{ Form::label('note', 'Note') }}
                        {{ Form::text('note', $order->note,
                        ['class' => 'form-control' , 'disabled' ] ) }}
                      </div>
                      <div class="col">
                        {{ Form::label('state', 'State') }}
                        {{ Form::text('state', $order->state,
                        ['class' => 'form-control' , 'disabled']) }}
                      </div>
                    </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection
 