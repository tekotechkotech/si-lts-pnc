
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="{{ asset('') }}assets/index3.html" class="navbar-brand">
        <img src="{{ asset('') }}assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold">SI-LTS PNC</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="alumni/dashboard" class="nav-link  @yield('home')">Home</a>
          </li>
          <li class="nav-item">
            <a href="alumni/tracer-study" class="nav-link @yield('tracer')">Tracer Study</a>
          </li>
          <li class="nav-item">
            <a href="alumni/legalisasi" class="nav-link @yield('legal')">Legalisasi</a>
          </li>
          <li class="nav-item">
            <a href="alumni/pengaturan" class="nav-link @yield('profil')">Pengaturan Profil</a>
          </li>
        </ul>


      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto d-flex justify-content-between">
        {{-- <hr> --}}
        {{-- <div class="d-flex justify-content-between"> --}}
        <li class="nav-item ">
          <a class="nav-link" data-widget="control-sidebar" role="button">
            <img src="{{ asset('') }}assets/dist/img/AdminLTELogo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Adinda Alumni</span>
          </a>
        </li>
        <li class="nav-item">
            <a href="index3.html" class="nav-link btn btn-dark text-light">Logout</a>
          </li>
        {{-- </div> --}}

      </ul>
    </div>
  </nav>
  <!-- /.navbar -->
  