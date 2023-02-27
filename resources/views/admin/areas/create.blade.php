@extends('admin.layouts.master')
@push('css')
<link rel="stylesheet" href="{{  asset('assets/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{  asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush('css')
@section('main-pageName')   Areas  @endsection
@section('pageName')  Create  @endsection
@section('content')
<section class="content">
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add new area</h3>
              </div>
               {{ Form::open(['route' => 'areas.store'] ) }}
                  @include('admin.areas.form')
                  <div class="card-footer">
                    {{ Form::submit('Add',['class' => 'btn btn-primary']) }}
                  </div>
               {{ Form::close() }}
            </div>
            </div>
          </div>
        </div>
      </div>
</section>
@endsection
 