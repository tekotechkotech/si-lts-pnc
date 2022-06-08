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
      <div class="col-lg-3 col-md-3 col-sm-12">
        
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset('') }}assets/dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Nina Mcintire</h3>

                <p class="text-muted text-center">NIM 190102024</p>
                <a href="#" class="btn btn-primary btn-block"><b>Ganti Foto Profil</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-body">
                <div class="form-group">
                  <label for="nim">NIM</label>
                  <input class="form-control" id="nim" value="190102024" disabled>
                </div>
                <div class="form-group">
                  <label for="ipk">IPK</label>
                  <input class="form-control" id="ipk" value="3.90 // Cumloude" disabled>
                </div>
                <div class="form-group">
                  <label for="tahun_lulus">Tahun Lulus</label>
                  <input type="text" class="form-control" id="tahun_lulus" value="Tahun Lulus" disabled>
                </div>
              </div>
            </div>

      </div>
      <div class="col-lg-5 col-md-5 col-sm-12">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <label for="name">Nama Lengkap</label>
              <input type="text" class="form-control" id="name" value="Nama Lengkap" disabled>
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="username" class="form-control" id="username" value="Username" disabled>
            </div>
            <div class="form-group">
              <label for="tempat_lahir">Tempat Lahir</label>
              <input type="text" class="form-control" id="tempat_lahir" value="Nama Lengkap" disabled>
            </div>
            <div class="form-group">
              <label for="tanggal_lahir">Tanggal Lahir</label>
              <input type="date" class="form-control" id="tanggal_lahir" value="Nama Lengkap" disabled>
            </div>
            <div class="form-group">
              <label for="jenis_kelamin">Jenis Kelamin</label>
              <input type="text" class="form-control" value="Laki-laki" disabled>
              {{-- <select class="form-control" id="jenis_kelamin">
                <option>Laki-Laki</option>
                <option>Perempuan</option>
              </select> --}}
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" value="Nama Lengkap" disabled>
            </div>
            <div class="form-group">
              <label for="no_telp">No. Telp</label>
              <input type="text" class="form-control" id="no_telp" value="Nama Lengkap" disabled>
            </div>
            <div class=" d-flex justify-content-end">
              <a href=""  class="btn btn-primary">Edit Data Diri</a>
            </div>
          </div>   
          
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <label for="provinsi">Provinsi</label>
              <input class="form-control" id="provinsi" value="Provinsi" disabled>
            </div>
            <div class="form-group">
              <label for="kabupaten">Kabupaten</label>
              <input class="form-control" id="kabupaten" value="Kabupaten" disabled>
            </div>
            <div class="form-group">
              <label for="kecamatan">Kecamatan</label>
              <input type="text" class="form-control" id="kecamatan" value="Kecamatan" disabled>
            </div>
            <div class="form-group">
              <label for="desa">Desa</label>
              <input type="text" class="form-control" id="desa" value="Desa" disabled>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="rt">RT</label>
                  <input type="text" class="form-control" id="rt" value="RT" disabled>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="rw">RW</label>
                  <input type="text" class="form-control" id="rw" value="RW" disabled>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="jalan">Jalan</label>
              <input type="text" class="form-control" id="jalan" value="Jalan" disabled>
            </div>

            <div class=" d-flex justify-content-end">
              <a href=""  class="btn btn-primary">Edit Alamat</a>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class=" d-flex justify-content-between align-content-center">
            <label for="">Ganti Password</label>
              <a href=""  class="btn btn-primary">Ganti</a>
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
