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
        <h1 class="m-0">Ajukan legalisir</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">legalisir</a></li>
          <li class="breadcrumb-item active">Pengajuan</li>
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

            <form action="{{ route('alumni.legalisir.store') }}" method="post" enctype="multipart/form-data">
              @csrf
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="name">Nama Lengkap</label>
                  <input type="text" class="form-control" id="name"  value="{{ old('name', $all->name) }}" disabled>
                  
                </div>
                <div class="form-group">
                  <label for="nim">NIM</label>
                  <input type="text" class="form-control " id="nim"  value="{{ old('nim', $all->nim) }}" disabled>
                  <input type="hidden" name="nim" value="{{ old('nim', $all->nim) }}">
                </div>
                <div class="form-group pt-1">
                  <label for="jenis">Jenis legalisir</label>
                  <select name="jenis" class="form-control" id="jenis">
                    <option value="legalisir Ijazah">legalisir Ijazah</option>
                    <option value="legalisir Transkip Nilai">legalisir Transkip Nilai</option>
                  </select>
                </div>
                <div class="form-group  pt-1">
                  <label>Upload File</label>
                  <div class="form-group">
                    {{-- <label for="exampleFormControlFile1">Example file input</label> --}}
                    <input type="file" name="berkas" class="form-control-file" id="exampleFormControlFile1">
                  </div>
                </div>
                <div class="form-group pt-1">
                  <label for="keterangan">Keterangan</label>
                  <textarea name="keterangan" id="keterangan" class="form-control" rows="5"></textarea>
                </div>
                {{-- <input type="hidden" name="id" value="alumni_id"> --}}
                <button type="submit" name="submit" class="btn btn-primary btn-block">Ajukan legalisir</button>
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
