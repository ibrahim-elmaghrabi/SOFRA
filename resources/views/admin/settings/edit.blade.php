@extends('admin.layouts.master')
@section('main-pageName') Settings   @endsection
@section('pageName')  Edit  @endsection
@section('content')
<section class="content">
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Apllication Settings</h3>
              </div>
                {{ Form::model($setting, ['method'=> 'PUT', 'route'=> ['settings.update', 1 ]]) }}
                <div class="card-body">
                  <div class="form-group">
                    {{ Form::label('commission', 'commission' ) }}
                    {{ Form::text('commission',
                          $setting->commission, ['class'=> 'form-control'] ) }}
                  </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  {{ Form::submit('Update' , ['class' => 'btn btn-primary']) }}
                </div>
              {{ Form::close()}}
             </div>
            </div>
          </div>
        </div>
      </div>
</section>
@endsection
@push('scripts')
@endpush