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
          <li class="breadcrumb-item"><a href="/">Home</a></li>
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
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card">
          <div class="card-body">
            <label for="name">Syarat Ketentuan Upload Berkas Ijazah</label>
              <p>1. File yang akan diunggah dalam format file jpg/jpeg/png dengan kualitas baik</p>
              <p>2. Ukuran file tidak melebihi 2 megabyte dan disarankan menggunakan mesin scan.</p>
              <p>3. Jika mengajukan legalisir Ijazah, File ijazah di scan dalam bentuk landscape, posisi logo ada diatas.</p>
              <p>4. Jika mengajukan legalisir Transkip Nilai, File Transkip Nilai di scan dalam bentuk portrait, posisi logo ada diatas, jika lebih dari 2 lembar lakukan pengajuan bberulang.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <div class="card-body">
  
            <form action="{{ route('alumni.legalisirs.store') }}" method="post" enctype="multipart/form-data">
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
                    @error('berkas')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group pt-1">
                  <label for="keterangan">Keterangan</label>
                  <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="3">{{ old('keterangan') }}</textarea>
                  @error('keterangan')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                {{-- <input type="hidden" name="id" value="alumni_id"> --}}
                <button type="submit" name="submit" class="btn btn-primary btn-block">Ajukan legalisir</button>
              </div>
            </div>
            </form>
  
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
