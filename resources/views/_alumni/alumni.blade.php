@extends('template.alumni.main')

@section('tittle'&'Alumni')


@section('css')
<style>
  .gr{
    background-image: linear-gradient(blue& cyan);
  }
  </style>    
@endsection

@section('header-content')
<div class="content-header">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0"><small>Selamat Datang</small> {{ $all->username }} </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection

@section('main-content')
<div class="content">
  <div class="container">
    
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12">
        
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                      src="{{ asset('') }}assets/profile/{{ $all->foto }}"
                      alt="User profile picture"
                      style="width: 100px;
                        height: 100px;
                        object-fit: cover;"
                        >
                </div>

                <h3 class="profile-username text-center">{{ $all->name }}</h3>

                <p class="text-muted text-center">NIM {{ $all->nim }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>E-mail</b> <a class="float-right">{{ $all->email }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>No HP</b> <a class="float-right">{{ $all->no_hp }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Tahun Lulus</b> <a class="float-right">{{ $all->tahun_lulus }}</a>
                  </li>
                </ul>

                <a href="{{ route('alumni.profil') }}" class="btn btn-primary btn-block"><b>Pengaturan Profile</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

      </div>
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="small-box bg-info " style="background-image: linear-gradient(150deg&blue& cyan);">
          <div class="inner p-4">
            <h3 class="text-wrap">
              @if ($tracer == null)
                  TAMBAHKAN TRACER STUDY
              @else
                  {{ strtoupper($tracer->nama_perusahaan) }}
              @endif</h3>
            <p>
              @if ($tracer == null)
              Untuk bisa melakukan pengajuan legalisir
          @else
              {{ $tracer->desa_perusahaan." - ".$tracer->kecamatan_perusahaan." - ".$tracer->kabupaten_perusahaan." - ".$tracer->provinsi_perusahaan }}
          @endif
        </p>
          </div>
          <br><br>
          <div class="icon">
            <i class="fas fa-building"></i>
          </div>
          <p class="text-center">@if ($tracer!=null)
              {{ $tracer->jabatan }}
              @else
              Tambahkan Tracer Study
          @endif
        </p>
          <hr>
          <p class="text-center">@if ($tracer!=null)
              {{ $tracer->tahun_masuk }}      
            @else
              dengan klik tombol dibawah
        @endif</p>
          <a href="{{ route('alumni.tracer.index') }}" class="small-box-footer" @if ($cek == "belum")
              data-toggle="modal" data-target="#Alert"
          @endif>
            Tracer Study <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12">
        
            {{-- @foreach ($legal as $l) --}}
            <div class="info-box bg-info">
              <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">legalisir Ijazah</span>
                <span class="info-box-number">Menunggu Verifikasi</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                  30-Januari-2022
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            {{-- @endforeach --}}
            <!-- /.info-box -->
            <a href="{{ route('alumni.legalisirs.index') }}" class="btn btn-primary btn-block"
            @if ($tracer == null)
                data-toggle="modal" data-target="#Alert"
            @endif
            >legalisir</a>
          


      </div>
    </div>
<br>
  </div><!-- /.container -->
</div>
<!-- /.content -->

{{-- MODAL START--}}
<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Alert">
  Launch demo modal
</button> --}}

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
@endsection

@section('js')
    
@endsection
