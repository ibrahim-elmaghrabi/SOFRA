@extends('admin.layouts.master')
@section('main-pageName') Payment Method   @endsection
@section('pageName')  Edit  @endsection
@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit<strong> {{ $paymentMethod->name }}</strong> paymentMethod</h3>
              </div>
              {{   Form::model($paymentMethod,[
                'method' => 'PUT' ,
                'route'  =>  ['payment-methods.update', $paymentMethod->id],
                ])}}
               @include('admin.paymentMethods.form')
              {{   Form::close() }}
            </div>
            </div>
          </div>
        </div>
      </div>
</section>
@endsection
 