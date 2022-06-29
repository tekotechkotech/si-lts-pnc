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
        <h1 class="m-0">Detail legalisir</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">legalisir</a></li>
          <li class="breadcrumb-item active">Edit</li>
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
        <div class="card">
          {{-- @if ($legal->jenis_berkas == "legalisir Ijazah") --}}
          <img src="{{ public_path('assets/legal/ijazah/'.$legal->upload_berkas) }}" class="card-img-top" >
          {{-- @endif --}}
          <div class="card-body">

            <div class="row">
              <div class="col">
                <div class="form-group pt-1">
                  <label for="nama">nama legalisir</label>
                  <input type="text" name="nama" class="form-control" value="{{ $legal->name }}" disabled>
                </div>
                <div class="form-group pt-1">
                  <label for="nim">NIM</label>
                  <input type="text" name="nim" class="form-control" value="{{ $legal->nim }}" disabled>
                </div>
                <div class="form-group pt-1">
                  <label for="jenis">Jenis legalisir</label>
                  <input type="text" name="jenis" class="form-control" value="{{ $legal->jenis_berkas }}" disabled>
                </div>
                <div class="form-group pt-1">
                  <label for="keterangan">Keterangan</label>
                  <textarea name="keterangan" id="keterangan" class="form-control" rows="5" disabled>{{ $legal->keterangan }}</textarea>
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
