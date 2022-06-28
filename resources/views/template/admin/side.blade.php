<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ asset('') }}assets/index3.html" class="brand-link">
    <img src="{{ asset('') }}assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">SI-LTS PNC</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('') }}assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        
        <li class="nav-item">
          <a href="/" class="nav-link   @yield('dashboard')">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-header">DATA</li>

        <li class="nav-item">
          <a href="{{ route('admin.data-admin.index') }}" class="nav-link   @yield('admin')">
            <i class="nav-icon fa fa-users"></i>
            <p>
              Data Admin
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.data-alumni.index') }}" class="nav-link   @yield('alumni')">
            <i class="nav-icon fa fa-users"></i>
            <p>
              Data Alumni
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.data-tracer') }}" class="nav-link   @yield('tracer')">
            <i class="nav-icon fas fa-graduation-cap"></i>
            <p>
              Data Tracer Study
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/admin/legalisir/data" class="nav-link   @yield('legal')">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Data legalisir
            </p>
          </a>
        </li>

@if (Auth::user()->admin->jabatan != 'Super Admin')
    
        <li class="nav-header">PROSES</li>

        <li class="nav-item @yield('proses-legal')">
          <a href="#" class="nav-link   @yield('proses-legal')">
            <i class="nav-icon fas fa-file"></i>
            <p>
              Proses legalisir
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @if (Auth::user()->admin->jabatan == 'Kepala BAAK')
            <li class="nav-item">
              <a href="/admin/legalisir/verifikasi" class="nav-link   @yield('verifikasi')">
                <i class="far fa-circle nav-icon"></i>
                <p>Menunggu Verifikasi</p>
              </a>
            </li>
            @elseif(Auth::user()->admin->jabatan == 'Wakil Direktur 1')
            <li class="nav-item">
              <a href="/admin/legalisir/legalisir" class="nav-link   @yield('legalisir')">
                <i class="far fa-circle nav-icon"></i>
                <p>Menunggu legalisir</p>
              </a>
            </li>
            @elseif(Auth::user()->admin->jabatan == 'Pegawai BAAK')
            <li class="nav-item">
              <a href="/admin/legalisir/cetak" class="nav-link   @yield('cetak')">
                <i class="far fa-circle nav-icon"></i>
                <p>Menunggu Cetak</p>
              </a>
            </li>
            <li class="nav-item ">
              <a href="/admin/legalisir/ambil" class="nav-link   @yield('ambil')">
                <i class="far fa-circle nav-icon "></i>
                <p>Menunggu Diambil</p>
              </a>
            </li>
                
            @else
                
            @endif
          </ul>
        </li>
        @endif

        <li class="nav-header">AKUN</li>

        <li class="nav-item">
          <a href="{{ route('admin.pengaturan') }}" class="nav-link   @yield('atur')">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
              Pengaturan
            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>