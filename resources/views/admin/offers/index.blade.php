@extends('admin.layouts.master')
@push('css')
 <!-- DataTables -->
  <link rel="stylesheet" href="{{  asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{  asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{  asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
@section('main-pageName') Offers  @endsection
@section('pageName') Manage @endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
           <div class="col-12">
                 <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable of <strong>Offers</strong> </h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped text-center">
                            <caption>DataTable of Offers</caption>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Restaurant</th>
                                    <th>Title</th>
                                    <th>offer</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($offers as $offer)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $offer->restaurant->name }}</td>
                                    <td>{{ $offer->title }}</td>
                                    <td>{{ $offer->offer }}</td>
                                    <td>{{ $offer->start_date }}</td>
                                    <td>{{ $offer->end_date}}</td>
                                    <td>
                                        {{ Form::open(
                                            ['method'=> 'DELETE', 'route'=> ['offers.destroy', $offer->id]]
                                            ) }}
                                            <button type="submit" class="btn btn-danger"
                                                                onclick="return confirm('Are you sure?')" >
                                                    <i class="fa-solid fa-trash"></i>
                                            </button>
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                                @empty
                                    <p>No offers yet !</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                 </div>
           </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
<!-- DataTables  & Plugins -->
<script src="{{  asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{  asset('assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{  asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{  asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{  asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endpush