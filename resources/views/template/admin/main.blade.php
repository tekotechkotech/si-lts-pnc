<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/pnc-logo.png') }}">
  <title>SI-LTS PNS |   @yield('tittle')</title>



  @include('template.css')
  @yield('css')
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  
  @include('sweetalert::alert')
  <!-- Navbar -->
  @include('template.admin.nav')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('template.admin.side')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Content Header (Page header) -->
    @yield('header-content')

    <!-- Main content -->
    @yield('main-content')

  </div>
  <!-- /.content-wrapper -->

@include('template.foot')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('template.js')

@yield('js')
</body>
</html>
