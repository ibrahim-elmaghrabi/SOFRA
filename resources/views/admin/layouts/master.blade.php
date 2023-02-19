<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      @include('admin.layouts.head')
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('assets/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
      </div>
      <!-- Navbar -->
      @include('admin.layouts.main-headbar')
      <!-- Main Sidebar Container -->
        @include('admin.layouts.main-sidebar')
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">@yield('page_name')</a></li>
                  <li class="breadcrumb-item active">@yield('page_name2')</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!-- Main content -->
            @yield('content')
      </div>
      @include('admin.layouts.footer')
      <aside class="control-sidebar control-sidebar-dark">
      </aside>
    </div>
    @include('admin.layouts.footer-scripts')
  </body>
</html>
