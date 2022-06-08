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
        <h1 class="m-0">Tambah Legalisasi</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Legalisasi</a></li>
          <li class="breadcrumb-item active">Tambah</li>
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
          <div class="card-body">

            <form action="" method="post">
              @csrf
            <div class="row">
              <div class="col">
                <div class="form-group pt-1">
                  <label for="jenis">Jenis Legalisasi</label>
                  <select name="jenis" class="form-control" id="jenis">
                    <option value="">Legalisasi Ijazah</option>
                    <option value="">Legalisasi Transkip Nilai</option>
                  </select>
                </div>
                <div class="form-group  pt-1">
                  <label for="berkas" >Upload File</label>
                  <div class="custom-file">
                    <label for="berkas" class="custom-file-label ">Pilih Berkas</label>
                    <input type="file" name="berkas" class="custom-file-input" id="berkas">
                  </div>
                </div>
                <div class="form-group pt-1">
                  <label for="keterangan">Keterangan</label>
                  <textarea name="keterangan" id="keterangan" class="form-control" rows="5"></textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
              </div>
            </div>
            </form>

          </div>
        </div>
  </div><!-- /.container -->
</div>
<!-- /.content -->
@endsection

@section('js')
    
@endsection
