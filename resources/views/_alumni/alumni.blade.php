@extends('template.alumni.main')

@section('tittle','Dashboard Alumni')


@section('css')
<style>
  .gr{
    background-image: linear-gradient(blue, cyan);
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
        <div class="small-box bg-info gr" style="background-image: linear-gradient(150deg, blue, cyan);">
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
              @php
                  if ($legal==null) {
                      $status = 'Melakukan pengajuan legalisir';
                      $percen = '100';
                  }elseif($legal->level_acc == 0){
                      $status = 'Menunggu Verifikasi';
                      $percen = '30';
                  }elseif($legal->level_acc == 1){
                      $status = 'Telah Diverifikasi';
                      $percen = '70';
                  }elseif($legal->level_acc == 2){
                      $status = 'Legalisir Selesai';
                      $percen = '100';
                  }else {
                  $status = 'Ditolak';
                  $percen = '0';
                  }
              @endphp
      <div class="col-lg-4 col-md-4 col-sm-12">
        
            {{-- @foreach ($legal as $l) --}}
            <div class="info-box bg-info">
              <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
              <div class="info-box-content">
                @if ($legal==null)
                <span class="info-box-text">Belum Pernah</span>
                @else
                <span class="info-box-text">{{ $legal->jenis_berkas }}</span>
                @endif

                <span class="info-box-number">{{ $status }}</span>

                <div class="progress">
                  <div class="progress-bar" style="width: {{ $percen }}%"></div>
                </div>
                <span class="progress-description">
                  
                  
                  @if ($legal==null)
                  {{ Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}
                  @else
                  {{ Carbon\Carbon::parse($legal->created_at)->isoFormat('dddd, D MMMM Y') }}
                  @endif

                  
                  

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


@endsection

@section('js')
    
@endsection
