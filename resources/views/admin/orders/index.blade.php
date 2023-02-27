@extends('admin.layouts.master')
@push('css')
 <!-- DataTables -->
  <link rel="stylesheet" href="{{  asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{  asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{  asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
@section('main-pageName') Orders @endsection
@section('pageName') Manage @endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
           <div class="col-12">
                 <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable of <strong>Orders</strong> </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped text-center">
                            <caption>DataTable of orders</caption>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Restaurant</th>
                                    <th>client</th>
                                    <th>Payment-Method</th>
                                    <th>Total-Cost</th>
                                    <th>App-Commission</th>
                                    <th>State</th>
                                    <th>Date</th>
                                    <th>View</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $order->restaurant->name }}</td>
                                    <td>{{ $order->client->email }}</td>
                                    <td>{{ $order->paymentMethod->name }}</td>
                                    <td>{{ $order->total_cost }}</td>
                                    <td>{{ $order->commission }}</td>
                                    <td>{{ $order->state }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td><a href="{{ route('orders.show', $order->id ) }}">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </td>
                                    <td>
                                        {{ Form::open(
                                            ['method'=> 'DELETE', 'route'=> ['orders.destroy', $order->id]]
                                            ) }}
                                            <button type="submit" class="btn btn-danger"
                                                                onclick="return confirm('Are you sure?')" >
                                                    <i class="fa-solid fa-trash"></i>
                                            </button>
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                                @empty
                                    <p>No Restuarnts yet !</p>
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