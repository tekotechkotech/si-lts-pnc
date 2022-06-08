@extends('template.alumni.main')

@section('tittle','Alumni')
@section('tracer','active')


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
        <h1 class="m-0"><small>Selamat Datang</small> Sodara Fulan </h1>
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
        <div class="card">
          <div class="card-body">
            <h5 class="text-wrap text-center">Update Selalu data Tracer Study-mu</h5>
            <p class="text-center">dengan klik tombol di bawah</p>
            <div class="p-2">
              <a href="" class="btn btn-primary btn-block">Tambah Tracer Study</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8 col-md-8 col-sm-12">
        <div class="card  bg-primary">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center p-2">
              <div class="">
                <h4>PT GOLET DIGITAL SOLUSI</h4>
                <span>Cilacap Utara, Cilacap, jawa Tengah</span>
              </div>
              <div class="text-right">
                <span><b>Fullstack Developer</b></span><br><br>
                <span>2022 - Sekarang</span>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="d-flex justify-content-end">
              <a href="" class="btn btn-light text-success mx-1">
                <i class="fas fa-file-alt"></i>
                <span>Detail</span>
              </a>
              
              <a href="" class="btn btn-light text-danger mx-1">
                <i class="fas fa-trash-alt"></i>
                {{-- <br> --}}
                <span>Hapus</span>
              </a>
            </div>
          </div>
        </div>
              
              {{-- <a href="" class="info-box m-1 "> --}}
              {{-- </a> --}}
              {{-- <div class="info-box mb-3">
                
                <a class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></a>
                <!-- /.info-box-content -->
              </div> --}}
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div><!-- /.container -->
</div>
<!-- /.content -->
@endsection

@section('js')
    
@endsection
