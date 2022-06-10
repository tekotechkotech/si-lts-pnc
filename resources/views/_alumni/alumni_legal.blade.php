@extends('template.alumni.main')

@section('tittle','Alumni')
@section('legal','active')


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
        <h1 class="m-0">Legalisasi</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Legalisasi</li>
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
        <div class="card">
          <div class="card-body">
            <h5 class="text-wrap text-center">Membutuhkan Berkas Legalisasi?</h5>
            <p class="text-center">silahkan ajukan dengan klik tombol di bawah</p>
            <div class="p-2">
              <a href="{{ route('alumni.legalisir.create') }}" class="btn btn-primary btn-block">Ajukan Legalisasi</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8 col-md-8 col-sm-12">
        @empty($legal->upload_berkas)
        <div class="info-box bg-secondary d-flex align-items-center">
          <div class="info-box-content">
              <span class="info-box-text">Pengajuan Legalisasi kosong</span>
              <span class="info-box-number">Silahkan ajukan legalisasi</span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
              <span class="progress-description">
                {{ date(now()); }}
              </span>
          </div>
          
        </div>
        @else 
        
        <div class="info-box bg-primary d-flex align-items-center">
          <div class="info-box-content">
              <span class="info-box-text">Legalisasi Ijazah</span>
              <span class="info-box-number">Menunggu Verifikasi</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
              <span class="progress-description">
                30 Mei 2020
              </span>
          </div>
          <div class="d-flex justify-content-end">
              <a href="" class="btn btn-light text-success m-2">
                <i class="fas fa-file-alt"></i>
                <br>
                <span>Detail</span>
              </a>
              <br>
              <a href="" class="btn btn-light text-danger m-2">
                <i class="fas fa-trash-alt"></i>
                <br>
                <span>Hapus</span>
              </a>
          </div>
        </div>
        @endempty
          
      </div>
    </div>
  </div><!-- /.container -->
</div>
<!-- /.content -->

@endsection

@section('js')
    
@endsection
