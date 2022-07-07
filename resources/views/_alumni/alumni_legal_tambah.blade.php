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
    <div class="row">
        <div class="col col-lg-3 col-md-4 col-sm-12">
          <div class="card">
            <div class="card-body">
              <label>Ketentuan Upload File</label>

          <br> <span>1. File yang akan diunggah dalam format file jpg/jpeg/png dengan kualitas baik</span>
          <br> <span>2. Ukuran file tidak melebihi 2 megabyte dan disarankan menggunakan mesin scan.</span>
          <br> <span>3. Jika Pengajuan legalisisr ijazah, file ijazah di scan dalam bentuk landscape, posisi logo ada diatas.</span>
          <br> <span>4. Jika Pengajuan legalisir transkrip nilai, file transkrip nilai di scan dalam bentuk potrait, posisi logo ada diatas. Jika lebih dari 1 lembar lakukan pengajuan berulang, maksimal pengajuan transkrip nilai sebanyak 3 kali pengajuan</span>
            </div>
          </div>
      </div>
      <div class="col col-lg-9 col-md-8 col-sm-12">

        <div class="card">
          <div class="card-body">

            <form method="post" enctype="multipart/form-data">
              @csrf
            <div class="row">
              
              <div class="col ">
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
                    <option value="legalisir Transkrip Nilai">legalisir Transkrip Nilai</option>
                  </select>
                </div>
                <div class="form-group  pt-1">
                  <label>Upload File</label>
                  <div class="form-group">
                    {{-- <label for="exampleFormControlFile1">Example file input</label> --}}
                    <input type="file" name="berkas" class="form-control-file" id="exampleFormControlFile1">
                    @error('berkas')
                    <span class="text-danger" role="alert">
                      <small> {{ $message }} </small>
                  </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group pt-1">
                  <label for="keterangan">Keterangan</label>
                  <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="3">{{ old('keterangan') }}</textarea>
                  @error('keterangan')
                    <span class="text-danger" role="alert">
                        <small> {{ $message }} </small>
                    </span>
                  @enderror
                </div>
                {{-- <input type="hidden" name="id" value="alumni_id"> --}}
                <button formaction="{{ route('alumni.legalisirs.store') }}" type="submit" name="submit" class="btn btn-primary btn-block">Ajukan legalisir</button>
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
