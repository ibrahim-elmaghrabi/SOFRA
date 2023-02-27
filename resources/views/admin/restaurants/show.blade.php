@extends('admin.layouts.master')
@push('css')
<!-- BS Stepper -->
  <link rel="stylesheet" href="{{  asset('assets/plugins/bs-stepper/css/bs-stepper.min.css')}}">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{  asset('assets/plugins/dropzone/min/dropzone.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{  asset('assets/dist/css/adminlte.min.css')}}">
@endpush
@section('main-pageName') Restaurant @endsection
@section('pageName')  View  @endsection
@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Restaurant</h3>
              </div>
              <div class="card-body p-0">
                <div class="bs-stepper">
                  <div class="card-body">
                    <div class="row">
                        <div class="col">
                            {{ Form::label('name' , 'Name') }}
                            {{ Form::text('name', $restaurant->name,
                                    ['class' => 'form-control' , 'disabled'] ) }}
                        </div>
                        <div class="col">
                            {{ Form::label('age' , 'email') }}
                            {{ Form::text('age', $restaurant->email,
                                    ['class' => 'form-control' , 'disabled'] ) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            {{ Form::label('phone', 'Phone') }}
                            {{ Form::text('phone', $restaurant->phone,
                                    ['class' => 'form-control' , 'disabled']) }}
                        </div>
                        <div class="col">
                            {{ Form::label('delivery_phone', 'Delivery Phone') }}
                            {{ Form::text('delivery_phone', $restaurant->delivery_phone,
                                    ['class' => 'form-control' , 'disabled' ] ) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            {{ Form::label('area' , 'Area') }}
                            {{ Form::text('area',$restaurant->area->name,
                                    ['class' => 'form-control' , 'disabled']) }}
                        </div>
                        <div class="col">
                            {{ Form::label('city' , 'City') }}
                            {{ Form::text('city', $restaurant->area->city->name,
                                    ['class' => 'form-control' , 'disabled'] ) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                          {{ Form::label('open_at' ,'Open At') }}
                          {{ Form::text('open_at', $restaurant->open_at,
                                ['class' => 'form-control' , 'disabled'] ) }}
                        </div>
                        <div class="col">
                          {{ form::label('close_at' , 'Close At') }}
                          {{ Form::text('opne_at', $restaurant->close_at,
                                ['class' => 'form-control' , 'disabled']) }}
                        </div>
                      </div>

                      <div class="row">
                        <div class="col">
                          {{ Form::label('deliver_charge' ,'Delivery Charge') }}
                          {{ Form::text('delivery_charge', $restaurant->delivery_charge,
                                  ['class' => 'form-control' , 'disabled'] ) }}
                        </div>
                        <div class="col">
                          {{ form::label('minimum_order' , 'Minimum Order Price') }}
                          {{ Form::text('minimum_order', $restaurant->minimum_order,
                                  ['class' => 'form-control' , 'disabled']) }}
                        </div>
                      </div>

                      <div class="row">
                        <div class="col">
                          {{ Form::label('delivery_whatsapp' ,'Delivery Whatsapp') }}
                          {{ Form::text('delivery_whatsapp', $restaurant->delivery_whatsapp,
                                  ['class' => 'form-control' , 'disabled'] ) }}
                        </div>
                        <div class="col">
                          {{ form::label('status' , 'Status Now') }}
                          {{ Form::text('status', ($restaurant->active) ? 'open' : 'close',
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
    </div>
</section>
@endsection
 