@extends('template.alumni.main')

@section('tittle','Alumni')
@section('profil','active')


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
        <h1 class="m-0">Profil</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Profil</li>
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
      <div class="col">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <label for="name">Nama Lengkap</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
              @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="username" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}">
              @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="tempat_lahir">Tempat Lahir</label>
              <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
              @error('tempat_lahir')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="tanggal_lahir">Tanggal Lahir</label>
              <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
              @error('tanggal_lahir')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="jenis_kelamin">Jenis Kelamin</label>
              <input type="text" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" value="{{ old('jenis_kelamin') }}">
              @error('jenis_kelamin')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
              {{-- <select class="form-control" id="jenis_kelamin">
                <option>Laki-Laki</option>
                <option>Perempuan</option>
              </select> --}}
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="no_telp">No. Telp</label>
              <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" value="{{ old('no_telp') }}">
              @error('no_telp')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class=" d-flex justify-content-between">
              <a href=""  class="btn btn-secondary">Kembali</a>
              <a href=""  class="btn btn-primary">Edit Data Diri</a>
            </div>
          </div>   
          
        </div>
      </div>
    </div>
<br>
  </div><!-- /.container -->
</div>
<!-- /.content -->
@endsection

@section('js')
    
@endsection
