
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="/" class="navbar-brand">
        <img src="{{ asset('assets/img/pnc-logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold">SI-LTS PNC</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="{{ route('alumni.dashboard') }}" class="nav-link  @yield('home')">Home</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('alumni.tracer.index') }}" class="nav-link @yield('tracer')" @if ($tracer == null)
            data-toggle="modal" data-target="#Alert"
        @endif>Tracer Study</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('alumni.legalisirs.index') }}" class="nav-link @yield('legal')" @if ($tracer == null)
            data-toggle="modal" data-target="#Alert"
        @endif>legalisir</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('alumni.profil') }}" class="nav-link @yield('profil')">Pengaturan Profil</a>
          </li>
        </ul>


      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto d-flex justify-content-between">
        {{-- <hr> --}}
        {{-- <div class="d-flex justify-content-between"> --}}
        <li class="nav-item ">
          <a class="nav-link" >
            <img src="{{ asset('') }}assets/profile/{{ Auth::user()->foto }}" class="brand-image img-circle elevation-3" style="width: 35px;
            height: 35px;
            object-fit: cover;">
            <span class="brand-text font-weight-light">{{ Auth::user()->username }}</span>
          </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link btn btn-dark text-light">Logout</a>
          </li>
        {{-- </div> --}}
      </ul>
    </div>
    


  </nav>
  <!-- /.navbar -->

  <div class="modal fade" id="Alert" tabindex="-1" aria-labelledby="AlertLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="AlertLabel">PERHATIAN</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
          @if ($cek == "belum")
              <center>
                <b>Belum bisa menambahkan Tracer Study dan Melakukan Pengajuan Legalisir</b>
                <p>Untuk bisa mengisi Tracer Study dan pengajuan legalisir, anda harus melengkapi data diri terlebih dahulu</p>
              </center>
              @elseif ($tracer == null)
              <center>
              <b>Belum bisa Melakukan Pengajuan Legalisir</b>
              <p>Untuk bisa melakukan pengajuan legalisir, anda harus mengisi data tracer study terlebih dahulu</p>
            </center>
  
          @endif
  
          {{-- @if ($tracer == null)
              <b>Belum bisa Melakukan Pengajuan Legalisir</b>
              <p>Untuk bisa melakukan pengajuan legalisir, anda harus mengisi data tracer study terlebih dahulu</p>
          @endif --}}
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  {{-- MODAL END --}}
  