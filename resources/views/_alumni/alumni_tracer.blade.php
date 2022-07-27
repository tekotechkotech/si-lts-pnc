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
        <h1 class="m-0">Tracer Study </h1>
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
              <a href="{{ route('alumni.tracer.create') }}" class="btn btn-primary btn-block">Tambah Tracer Study</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-8 col-md-8 col-sm-12">
        
        @if ($tracer->count() < 1)
        <div class="card  bg-danger">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center p-2">
              <div class="">
                <h4>TRACER STUDY MASIH KOSONG</h4>
                <span>Harap tambahkan tracer study-mu</span>
              </div>
            </div>
          </div>
        </div>
        @else
        
@foreach ($tracer as $tracer)
        <div class="card  bg-primary">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center p-2">
              <div class="">
                <h4>{{ $tracer->nama_perusahaan }}</h4>
                <span>
              {{ $tracer->desa_perusahaan." - ".$tracer->kecamatan_perusahaan." - ".$tracer->kabupaten_perusahaan." - ".$tracer->provinsi_perusahaan }}
                </span>
              </div>
              <div class="text-right">
                <span><b>{{ $tracer->jabatan }}</b></span><br><br>
                <span>{{ $tracer->tahun_masuk }}</span>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="d-flex justify-content-end">
              {{-- <a href="/alumni/tracer/{{ $tracer->tracer_id }}/show" class="btn btn-light text-success mx-1">
                <i class="fa fa-file-text" aria-hidden="true"></i>
                <span>Detail</span>
              </a> --}}
              <a href="/alumni/tracer/{{ $tracer->tracer_id }}/edit" class="btn btn-light text-success mx-1">
                <i class="fas fa-edit"></i>
                <span>Edit</span>
              </a>
                
                <a  class="btn btn-light text-danger mx-1" data-toggle="modal" data-target="#Hapus{{ $tracer->tracer_id }}" ><i class="fas fa-trash-alt"></i> Hapus</a>

                </a>
            </div>
          </div>
        </div>

        
    <!-- ModalHapus -->
    <div class="modal fade" id="Hapus{{ $tracer->tracer_id }}" tabindex="-1" aria-labelledby="HapusLabel" aria-hidden="true">
      <div class="modal-dialog ">
          <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="HapusLabel">Hapus Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <center><h5>Yakin akan menghapus data tracer study ini?</h5></center>
              <hr>
              <div class="row">
                  <div class="col">
                      <div class="form-group">
                          <label for="nim">NIM</label>
                          <input type="text" disabled class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" placeholder="NIM" value="{{ old('nim', $tracer->nim) }}">
                      </div>
                  </div>
                  <div class="col">
                      <div class="form-group">
                          <label for="name">Nama</label>
                          <input type="text" disabled class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nama" value="{{ old('name', $tracer->name) }}">
                      </div>
                  </div>
              </div>
              <div class="form-group">
                  <label for="username">Nama Perusahaan</label>
                  <input type="text" disabled class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" value="{{ old('username', $tracer->nama_perusahaan) }}">
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              
              <form action="/alumni/tracer/{{ $tracer->tracer_id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn  btn-danger mx-1">
                  <i class="fas fa-trash-alt"></i>
                  <span>Hapus</span>
                </button>
              </form>

          </div>
          </div>
      </div>
      </div>

      {{-- MODAL END --}}

@endforeach
@endif
        
        
      </div>
    </div>
  </div><!-- /.container -->
</div>
<!-- /.content -->
@endsection

@section('js')
    
@endsection
