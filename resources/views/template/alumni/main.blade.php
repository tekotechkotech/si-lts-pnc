<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | @yield('tittle')</title>

  {{-- CSS --}}
  @include('template.css')

</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
    @include('template.alumni.nav')
  <!-- /.navbar -->
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      
      
    <!-- Content Header (Page header) -->
    @yield('header-content')

    <!-- Main content -->
    @yield('main-content')
    

  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  @include('template.foot')


</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

{{-- JS --}}
@include('template.js')

</body>
</html>
